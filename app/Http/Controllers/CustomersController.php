<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomersController extends Controller
{

    public function index()
    {
        // Get All Customers
        // get All Customers From Database
        $data = Customers::all();
        return response()->json(['status'=>'success', 'message'=>'All Customers List ', 'data'=>$data], 200);

    }


    public function store(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'plan' => 'required',
            'license' => 'required',
            'date_created' => 'required',
            'last_heard_from' => 'required'
         ]);

        $data = new Customers();
        $data->email = $request->email;
        $data->name = $request->name;
        $data->plan = $request->plan;
        $data->license = $request->license;
        $data->date_created = $request->date_created;
        $data->last_heard_from = $request->last_heard_from;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'Customer Created Successfully', 'data'=>$data], 200);

    }

    public function show(Request $request)
    {
        // GET(id)
        $this->validate($request, [
            'customer_id' => 'required',
         ]);

        $data = Customers::find($request->customer_id);
        return response()->json(['status'=>'success', 'message'=>'Get Customer Details Successfully', 'data'=>$data], 200);
    }


    public function update(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $this->validate($request, [
            'customer_id' => 'required',
            'email' => 'required',
            'name' => 'required',
            'plan' => 'required',
            'license' => 'required',
            'date_created' => 'required',
            'last_heard_from' => 'required',
         ]);

        $data = Customers::find($request->customer_id);
        $data->email = $request->email;
        $data->name = $request->name;
        $data->plan = $request->plan;
        $data->license = $request->license;
        $data->date_created = $request->date_created;
        $data->last_heard_from = $request->last_heard_from;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'Customer Updated Successfully', 'data'=>$data], 200);
    }


    public function destroy(Request $request)
    {
        // DELETE(id)
        // Delete by Id
        $this->validate($request, [
            'customer_id' => 'required',
         ]);
        
        $data = Customers::find($request->customer_id);
        $data->delete();
        return response()->json(['status'=>'success', 'message'=>'Customer Deleted Successfully'], 200);

    }

    public function deleteMultiple(Request $request)
    {
        
        $all_ids = explode(",",$request->customer_id); 
        foreach ($all_ids as $value) {
            $data = Customers::find($value);
            if(empty($data)){
                return response()->json(['status'=>'fail', 'message'=>'Please enter correct ID'], 200);
            }else{
                $data->delete();    
            }
            
        }
        return response()->json(['status'=>'success', 'message'=>'Customers Deleted Successfully'], 200);
    } 
}
