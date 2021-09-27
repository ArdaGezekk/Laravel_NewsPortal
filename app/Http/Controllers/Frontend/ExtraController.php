<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

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
  public function SinglePost($id){
   $post = DB::table('posts')
           ->join('categories','posts.category_id','categories.id')
           ->join('subcategories','posts.subcategory_id','subcategories.id')
           ->join('users','posts.user_id','users.id')
           ->select('posts.*','categories.category_en','categories.category_tr','subcategories.subcategory_en','subcategories.subcategory_tr','users.name')
           ->where('posts.id',$id)->first();
           return view('main.single_post',compact('post'));

}
}
