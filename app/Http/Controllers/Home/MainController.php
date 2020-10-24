<?php

namespace App\Http\Controllers\Home;

use App\User;
use App\Models\Cart;
use App\Models\Logic;
use App\Models\Sheet;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Pricing;
use App\Models\Question;
use App\Mail\ContactMail;
use App\Models\ContactUs;
use App\Models\Fragrance;
use App\Models\HowToOrder;
use Illuminate\Http\Request;
use App\Models\CustomProduct;
use App\Mail\MessageFromCustomer;
use Laravolt\Indonesia\Indonesia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCities = Indonesia::allProvinces();
        return view('question', compact('allCities'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fragrance()
    {
        $data['fragrance'] = Fragrance::where('qty', '>', 0)->get();
        return view('fragrance.custom')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sheet()
    {
        $user_id = Auth::user()->id;
        $answers = Answer::select('answers.question_id', 'answers.option_id', 'options.text')
            ->join('options', 'options.id', 'answers.option_id')
            ->where('answers.user_id', '=', $user_id)
            ->get()->toArray();
        if (empty($answers)) {
            return redirect()->route('main.question');
        }
        $option_3;
        $option_4;
        foreach ($answers as $key => $value) {
            if ($value['question_id'] == 3) {
                $option_3 = $value['text'];
            } else if ($value['question_id'] == 4) {
                $option_4 = $value['text'];
            }
        }
        $logic = Logic::where([
            ['option_3', '=', $option_3],
            ['option_4', '=', $option_4]
        ])->firstOrFail();
        $code_cart = Cart::orderBy('id', 'desc')->first();
        if (empty($code_cart)) {
            $code = 'C' . date('HisYmd') . $user_id . sprintf('%05d', 1);
        } else {
            $code = 'C' . date('HisYmd') . $user_id . sprintf('%05d', substr($code_cart->cart_code, -1) + 1);
        }
        $table = Cart::firstOrCreate(
            [
                'user_id' => $user_id,
                'type_cart' => 'custom',
                'status' => 'waiting'
            ],
            [
                'user_id' => $user_id,
                'logic_id' => $logic->id,
                'cart_code' => $code,
                'formula_code' => '#' . $logic->no_formula,
                'type_cart' => 'custom',
                'status' => 'waiting'
            ]
        );
        CustomProduct::where('cart_id', $table->id)->delete();
        $data['sheet'] = Sheet::where('qty', '>', 0)->get();
        return view('home.sheet')->with($data);
    }

    // /**
    // * Display a listing of the resource.
    // *
    // * @return \Illuminate\Http\Response
    // */
    // public function sheetAndFragrance()
    // {
    //     $user_id = Auth::user()->id;
    //     $cart_id = Cart::where([['user_id', '=', $user_id], ['status', '=', 'waiting']])->firstOrFail()->id;
    //     $data['product'] = CustomProduct::where('cart_id', '=', $cart_id)->get();
    //     return view('home.sheet_and_fragrance_page')->with($data);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pricing()
    {
        $data['price'] = Pricing::all();
        return view('home.pricing')->with($data);
    }

    /**
     * Display face result of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faceResult()
    {
        $user_id = Auth::user()->id;
        $answers = Answer::select('answers.question_id', 'answers.option_id', 'options.text')
            ->join('options', 'options.id', 'answers.option_id')
            ->where('answers.user_id', '=', $user_id)
            ->get()->toArray();
        if (empty($answers)) {
            return redirect()->route('main.question');
        } else {
            $option_3;
            $option_4;
            foreach ($answers as $key => $value) {
                if ($value['question_id'] == 3) {
                    $option_3 = $value['text'];
                } else if ($value['question_id'] == 4) {
                    $option_4 = $value['text'];
                }
            }
            $data['result'] = Logic::where([['option_3', '=', $option_3], ['option_4', '=', $option_4]])->firstOrFail();
            // dd($result);
            return view('custom.face-result')->with($data);
        }
    }

    /**
     * Display question of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function question()
    {
        $data['question'] = Question::findOrfail(1);
        return view('custom.question')->with($data);
    }

    public function getSoal(Request $request, $id, $act = 'next')
    {
        $option = $request->option_id;
        $question = Question::findOrfail($id);
        if ($question['status'] == "logic" && $option != null) {
            $match = ['user_id' => Auth::user()->id, 'question_id' => $id];
            Answer::updateOrCreate(
                $match,
                ['option_id' => $option]
            );
        }
        if ($id == 17) {
            return response()->json([], 201);
        } else {
            if ($act == 'next') {
                $data['question'] = Question::findOrfail(($id + 1));
            } else if ($act == 'prev') {
                $data['question'] = Question::findOrfail(($id - 1));
            } else {
                abort(404);
            }
            if ($id == 16) {
                $client = new GuzzleClient([
                    'headers' => ['key' => 'a9833b70a0d2e26d4f36024e66e6fdaa']
                ]);
                $requester = $client->get('https://api.rajaongkir.com/starter/city');
                $response = json_decode($requester->getBody()->getContents(), true);
                if ($response['rajaongkir']['status']['code'] === 200) {
                    $data['allCities'] = $response['rajaongkir']['results'];
                } else {
                    $data['allCities'] = Indonesia::allProvinces();
                }
            }
            return response()->json([
                'type' => $data['question']->type,
                'view' => view('home.question_soal_single')->with($data)->render()
            ], 200);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new GuzzleClient(['headers' => ['key' => 'a9833b70a0d2e26d4f36024e66e6fdaa']]);
        $request = $client->get('https://api.rajaongkir.com/starter/city');
        // $response = $request->getBody()->getContents();
        $response = json_decode($request->getBody()->getContents(), true);
        if ($response['rajaongkir']['status']['code'] === 200) {
            dd($$response['rajaongkir']['results']);
        }
    }

    public function contact()
    {
        return view('contact', [
            'admin' => $this->adminAccount->first(),
            'aboutUs' => $this->aboutUs
        ]);
    }

    public function ContactStore(Request $request)
    {
        if ($request->has('email_customer') <> 'admin@insive.com') {
            $contactUs = new ContactUs;
            $contactUs->nama_customer = $request->peopleName;
            $contactUs->email_customer = $request->peopleEmail;
            $contactUs->pesan = $request->message;
            $contactUs->save();

            Mail::to($this->adminAccount->first()->email)->send(new MessageFromCustomer($contactUs));
            return redirect()->back()->with(
                'success_message',
                'Message Succesfully Sent! Please Wait We"ll Reply You Maximum 24 Hours From Now'
            );
        } else {
            return redirect()->back()->with('error_message', "Admin can't contact to itself");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSheet(Request $request)
    {
        $sheet = $request->input('sheet');
        $qty = $request->input('jumlah_sheet');

        if ($sheet !== null) {
            $cart_id = Cart::where([
                ['user_id', Auth::id()],
                ['type_cart', 'custom'],
                ['status', 'waiting']
            ])->firstOrFail()->id;

            $data = [];

            foreach ($sheet as $key => $value) {

                $data[] = [
                    'cart_id' => $cart_id,
                    'sheet_id' => $value,
                    'qty' =>  $request->input('jumlah_sheet.' . $key),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            $table = CustomProduct::insert($data);

            return redirect()->route('main.fragrance');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFragrance(Request $request)
    {
        echo "test";
        $fragrance = $request->input('fragrance');
        $user_id = Auth::user()->id;
        $date_now = date('Y-m-d H:i:s');
        if ($fragrance !== null) {
            $cart_id = Cart::where([['user_id', '=', $user_id], ['type_cart', '=', 'custom'], ['status', '=', 'waiting']])->firstOrFail()->id;
            $count_sheet = CustomProduct::where('cart_id', '=', $cart_id)->count();
            $count_fragrance = count($fragrance);
            if ($count_sheet > 0) {
                $date_now = date('Y-m-d H:i:s');
                $sheet = CustomProduct::where('cart_id', '=', $cart_id)->get();
                $last_sheet_id = $sheet->last()->sheet_id;
                if ($count_sheet >= $count_fragrance) {
                    for ($i = 0; $i < $count_sheet; $i++) {
                        CustomProduct::where([['cart_id', '=', $cart_id], ['sheet_id', '=', $sheet[$i]->sheet_id]])
                            ->update(['fragrance_id' => ($i <= ($count_fragrance - 1)) ? $fragrance[$i] : last($fragrance)]);
                    }
                    return redirect(url('/home/cart'));
                } elseif ($count_sheet <= $count_fragrance) {
                    for ($j = 0; $j < $count_fragrance; $j++) {
                        if ($j <= ($count_sheet - 1)) {
                            CustomProduct::where([['cart_id', '=', $cart_id], ['sheet_id', '=', $sheet[$j]->sheet_id]])
                                ->update(['fragrance_id' => $fragrance[$j]]);
                        } else {
                            CustomProduct::create(['cart_id' => $cart_id, 'sheet_id' => $last_sheet_id, 'fragrance_id' => $fragrance[$j], 'qty' => 1, 'created_at' => $date_now, 'updated_at' => $date_now]);
                        }
                    }
                    return redirect(url('/home/cart'));
                } else {
                    return redirect(url('/'));
                }
            } else {
                return redirect()->route('main.question');
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //s
    }

    public function howToOrder()
    {
        $howToOrder = HowToOrder::first();
        return view('how-to', compact('howToOrder'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(url('/'));
    }
}
