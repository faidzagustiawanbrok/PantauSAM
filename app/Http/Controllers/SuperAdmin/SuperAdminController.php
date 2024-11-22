<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use  Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon ;



class SuperAdminController extends Controller
{
    //

public function index(){

    return view('super-admin.dashboard');
}


public function userrole(){
    $alluser = user::get();
   

    return view('super-admin.alluser.index',compact('alluser'));
}
public function edit_user($slug){

    $data = user::where('id',$slug)->FirstOrfail();
 
    return view('super-admin.alluser.edit',compact('data'));
}

// update user role 
public function update_user(Request $request){
    $id=$request['id'];
    $update=user::where('id',$id)->update([
        'role'=>$request['role'],
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

    if($update){
    Session::flash('success','value');
    return redirect()->back()->with('message','Information Update Successfully!');
    }else{
    Session::flash('error','value');
    return redirect()->with('message','Information Update Failed !');
    }


}





}





