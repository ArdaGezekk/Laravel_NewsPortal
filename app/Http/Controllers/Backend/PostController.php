<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
  //
  public function Create(){
    $category = DB::table('categories')->get();
    $district = DB::table('districts')->get();
    return view('backend.post.create',compact('category','district'));
  }
  public function GetSubCategory($category_id){
    $sub = DB::table('subcategories')->where('category_id',$category_id)->get();
    return response()->json($sub);
  }
  public function GetSubDistrict($district_id){
    $sub = DB::table('subdistricts')->where('district_id',$district_id)->get();
    return response()->json($sub);
  }
}
