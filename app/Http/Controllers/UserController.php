<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\Models\User;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function add()
    {
       return view('user/adduser');
    }

   //  public function addData(UserRequest $req)
   //  {
   //      $data = new User;

   //      $data->name=$req->name;
   //      $data->gender=$req->gender;
   //      $data->email=$req->email;
   //      $data->phone=$req->phone;
   //      $data->password=$req->password;
   //      $data->save();
   //      $req->session()->put('success','Your User Data added Successfully.');
   //      return redirect()->route('user.listing');
   //  }

   //  WITH AJAX
   public function addData(UserRequest $request)
   {
      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'gender'=>'required',
         'phone'=>'required',
         'email'=>'required|email',
         'password'=>'required'
     ]);

     if(!$validator->passes()){
         return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
     }else{
         $values = [
              'name'=>$request->name,
              'gender'=>$request->gender,
              'phone'=>$request->phone,
              'email'=>$request->email,
              'password'=>$request->password
         ];

         $query = DB::table('users')->insert($values);
         if( $query ){
             return response()->json(['status'=>1, 'msg'=>'New Blog has been successfully added']);
         }
     }
   }

    public function delete($id)
    {
       $user = User::find($id);
       $user->delete();
       return redirect()->route('user.listing');
    }

    public function view($id)
    {
       $user = User::find($id);
       return response()->json([
            "status"=>200,
            "data"=>$user,
       ]);
    }

    public function edit($id)
    {
       $user = User::find($id);
       return view('user/updateuser',['blog'=>$user]);
    }

    public function updateData(UserRequest $req)
    {
        $data = User::find($req->id);


        $data->name=$req->name;
        $data->gender=$req->gender;
        $data->email=$req->email;
        $data->phone=$req->phone;
        $data->password=$req->password;
        $data->save();
        $req->session()->put('success','Your User Data Updated Successfully.');
        return redirect()->route('user.listing');
    }
}

