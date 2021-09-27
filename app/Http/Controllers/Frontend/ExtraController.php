<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ExtraController extends Controller
{
  public function Turkish(){
    Session::get('lang');
    Session()->forget('lang');
    Session()->put('lang','turkish');
    return redirect()->back();
  }
  public function English(){
    Session::get('lang');
    Session()->forget('lang');
    Session()->put('lang','english');
    return redirect()->back();
  }
}
