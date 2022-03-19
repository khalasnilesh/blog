<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webhooks;

class WebhooksController extends Controller
{

    public function index()
    {
        // Get All Webhooks
        // get All Webhooks From Database
        $data = Webhooks::all();
        return response()->json(['status'=>'success', 'message'=>'All Webhooks List ', 'data'=>$data], 200);

    }


    public function store(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $data = new Webhooks();
        $data->site_id = $request->site_id;
        $data->status = $request->status;
        $data->target = $request->target;
        $data->headers1 = $request->headers1;
        $data->events = $request->events;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'Webhook Created Successfully', 'data'=>$data], 200);

    }


    public function show(Request $request)
    {
        // GET(id)
        // show each Webhooks by its ID from database
        $this->validate($request, [
            'webhook_id' => 'required',
         ]);
        $data = Webhooks::find($request->webhook_id);
        return response()->json(['status'=>'success', 'message'=>'Get Webhook Details Successfully', 'data'=>$data], 200);
    }


    public function update(Request $request)
    {

        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $this->validate($request, [
            'webhook_id' => 'required',
            'site_id' => 'required',
            'status' => 'required',
            'target' => 'required',
            'headers1' => 'required',
            'events' => 'required',
         ]);

        $data = Webhooks::find($request->webhook_id);
        $data->site_id = $request->site_id;
        $data->status = $request->status;
        $data->target = $request->target;
        $data->headers1 = $request->headers1;
        $data->events = $request->events;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'Webhook Updated Successfully', 'data'=>$data], 200);

    }


    public function destroy(Request $request)
    {
        // DELETE(id)
        // Delete by Id
        $this->validate($request, [
            'webhook_id' => 'required',
         ]);
        $data = Webhooks::find($request->webhook_id);
        $data->delete();
        return response()->json(['status'=>'success', 'message'=>'Webhook Deleted Successfully'], 200);

    }

    public function deleteMultiple(Request $request)
    {
        
        $all_ids = explode(",",$request->webhook_id); 
        foreach ($all_ids as $value) {
            $data = Webhooks::find($value);
            if(empty($data)){
                return response()->json(['status'=>'fail', 'message'=>'Please enter correct ID'], 200);
            }else{
                $data->delete();    
            }
            
        }
        return response()->json(['status'=>'success', 'message'=>'Webhooks Deleted Successfully'], 200);
    } 
}
