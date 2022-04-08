<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Auth;


class AuthController extends Controller
{

    public function index()
    {
        // Get All Users
        // get All Users From Database
        // $data = Users::all();
        // // return response()->json(['status'=>'success', 'message'=>'All Users List ', 'data'=>$data], 200);

        // return view('users.index',$data);

    }
    public function login()
    {
        // echo 'login '; exit; 
        return view('auth.login');

    }

    public function postlogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
       
        $user = Users::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
            $apikey = base64_encode(str_random(40));
            $auth_user = Users::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);
            // Auth::login($auth_user);
            return redirect('/');
            }else{
                return redirect('/login')->with('Message', 'Please enter correct password..!!');
            }
        }else{
            return redirect('/login')->with('Message', 'Please enter correct email..!!');
        }
    }

    public function register()
    {
        // echo 'login '; exit; 
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = new Users();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = 'admin';
        $data->password = Hash::make($request->password);
        $data->save();            
    }
}
