<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

  public function finish()
  {
    return view('payment.thanks');
  }

  public function unfinish()
  {
    return view('payment.unfinish');
  }

  public function error()
  {
    return view('payment.error');
  }
}
