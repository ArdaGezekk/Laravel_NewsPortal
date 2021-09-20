<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubDistrictController extends Controller
{
  public function Index(){
    $subdistrict = DB::table('subdistricts')
    ->join('districts','subdistricts.district_id','districts.id')
    ->select('subdistricts.*','districts.district_tr')
    ->orderBy('id','desc')->paginate(5);
    return view('backend.subdistrict.index',compact('subdistrict'));
  }
  public function AddSubDistrict(){
    $district = DB::table('districts')->get();
    return view('backend.subdistrict.create',compact('district'));
  }
  public function StoreSubDistrict(Request $request){
    $validatedData = $request->validate([
      'subdistrict_en' => 'required|unique:subdistricts|max:255',
      'subdistrict_tr' => 'required|unique:subdistricts|max:255',
    ]);
    $data = array();
    $data['subdistrict_en'] = $request->subdistrict_en;
    $data['subdistrict_tr'] = $request->subdistrict_tr;
    $data['district_id'] = $request->district_id;
    DB::table('subdistricts')->insert($data);
    $notification = array(
      'message' => 'SubDistrict Inserted Successfully',
      'alert-type' => 'success'
    );
    return Redirect()->route('subdistricts')->with($notification);
  }
  public function EditSubDistrict($id){
    $subdistrict = DB::table('subdistricts')->where('id',$id)->first();
    $district = DB::table('districts')->get();
    return view('backend.subdistrict.edit',compact('subdistrict','district'));
  }
  public function UpdateSubDistrict(Request $request, $id){
    $data = array();
    $data['subdistrict_en'] = $request->subdistrict_en;
    $data['subdistrict_tr'] = $request->subdistrict_tr;
    $data['district_id'] = $request->district_id;
    DB::table('subdistricts')->where('id',$id)->update($data);
    $notification = array(
      'message' => 'SubDistrict Updated Successfully',
      'alert-type' => 'success'
    );
    return Redirect()->route('subdistricts')->with($notification);
  }
  public function DeleteSubDistrict($id){
    DB::table('subdistricts')->where('id',$id)->delete();
    $notification = array(
      'message' => 'SubDistrict Deleted Successfully',
      'alert-type' => 'error'
    );
    return Redirect()->route('subdistricts')->with($notification);
  }
}
