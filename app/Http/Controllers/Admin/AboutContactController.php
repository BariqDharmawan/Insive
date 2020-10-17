<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        AboutUs::updateOrCreate(
            ['id' => 1],
            [
                'instagram' => $request->instagram,
                'phone' => $request->phone,
                'email' => $request->email,
                'embeded_map' => $request->embeded_map
            ]
        );
        return response()->json(['success' => 'Successfully update Insive contact']);
    }
}
