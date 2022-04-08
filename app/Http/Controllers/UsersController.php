<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        // Get All Users
        // get All Users From Database
        $data = Users::all();
        return response()->json(['status'=>'success', 'message'=>'All Users List ', 'data'=>$data], 200);

    }


    public function store(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $data = new Users();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->password = Hash::make($request->password);
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'User Created Successfully', 'data'=>$data], 200);

    }


    public function show(Request $request)
    {
        // GET(id)
        // show each Users by its ID from database
        $this->validate($request, [
            'user_id' => 'required',
         ]);
        $data = Users::find($request->user_id);
        return response()->json(['status'=>'success', 'message'=>'Get User Details Successfully', 'data'=>$data], 200);
    }

    public function update(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
         ]);

        $data = Users::find($request->user_id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'User Updated Successfully', 'data'=>$data], 200);
    }


    public function destroy(Request $request)
    {
        // DELETE(id)
        // Delete by Id
        $this->validate($request, [
            'user_id' => 'required',
         ]);
        $data = Users::find($request->user_id);
        $data->delete();
        return response()->json(['status'=>'success', 'message'=>'User Deleted Successfully'], 200);

    }

    public function deleteMultiple(Request $request)
    {
        
        $all_ids = explode(",",$request->user_id); 
        foreach ($all_ids as $value) {
            $data = Users::find($value);
            if(empty($data)){
                return response()->json(['status'=>'fail', 'message'=>'Please enter correct ID'], 200);
            }else{
                $data->delete();    
            }
            
        }
        return response()->json(['status'=>'success', 'message'=>'Users Deleted Successfully'], 200);
    } 
}
