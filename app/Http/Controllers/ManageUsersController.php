<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;


class ManageUsersController extends Controller
{

    public function index()
    {   

        $users = Users::all();
        print_r($users);exit; 
        return view('users.index',compact('users'));
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
            Users::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;
            return redirect('/');
            }else{
                echo 'Not DOne ';   
            }
        }else{
            echo 'Not DOne '; 
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
