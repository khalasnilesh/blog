<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sites;

class SitesController extends Controller
{

    public function index()
    {
        // Get All Sites
        // get All Sites From Database
        $data = Sites::all();
        return response()->json(['status'=>'success', 'message'=>'All Sites List ', 'data'=>$data], 200);

    }


    public function store(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $this->validate($request, [
            'site_key' => 'required',
            'wp_version' => 'required',
            'host' => 'required',
            'active_plugins' => 'required',
            'inactive_plugins' => 'required',
            'installed_plugins' => 'required',
            'ip_address' => 'required',
            'date_activated' => 'required',
            'last_heard_from' => 'required',
         ]);

        $data = new Sites();
        $data->site_key = $request->site_key;
        $data->wp_version = $request->wp_version;
        $data->host = $request->host;
        $data->active_plugins = $request->active_plugins;
        $data->inactive_plugins = $request->inactive_plugins;
        $data->installed_plugins = $request->installed_plugins;
        $data->ip_address = $request->ip_address;
        $data->date_activated = $request->date_activated;
        $data->last_heard_from  = $request->last_heard_from ;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'Site Created Successfully', 'data'=>$data], 200);
    }


    public function show(Request $request)
    {
        $this->validate($request, [
            'site_id' => 'required',
         ]);
        $data = Sites::find($request->site_id);
        return response()->json(['status'=>'success', 'message'=>'Get Site Details Successfully', 'data'=>$data], 200);
    }

    public function update(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $this->validate($request, [
            'site_id' => 'required',
            'site_key' => 'required',
            'wp_version' => 'required',
            'host' => 'required',
            'active_plugins' => 'required',
            'inactive_plugins' => 'required',
            'installed_plugins' => 'required',
            'ip_address' => 'required',
            'date_activated' => 'required',
            'last_heard_from' => 'required',
         ]);

        $data = Sites::find($request->site_id);
        $data->site_key = $request->site_key;
        $data->wp_version = $request->wp_version;
        $data->host = $request->host;
        $data->active_plugins = $request->active_plugins;
        $data->inactive_plugins = $request->inactive_plugins;
        $data->installed_plugins = $request->installed_plugins;
        $data->ip_address = $request->ip_address;
        $data->date_activated = $request->date_activated;
        $data->last_heard_from  = $request->last_heard_from ;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'Site Updated Successfully', 'data'=>$data], 200);
    }

    public function destroy(Request $request)
    {

        $this->validate($request, [
            'site_id' => 'required',
         ]);
        $product = Sites::find($request->site_id);
        $product->delete();
        return response()->json(['status'=>'success', 'message'=>'Site Deleted Successfully'], 200);

    }

    public function deleteMultiple(Request $request)
    {
        
        $all_ids = explode(",",$request->site_id); 
        foreach ($all_ids as $value) {
            $data = Sites::find($value);
            if(empty($data)){
                return response()->json(['status'=>'fail', 'message'=>'Please enter correct ID'], 200);
            }else{
                $data->delete();    
            }
            
        }
        return response()->json(['status'=>'success', 'message'=>'Sites Deleted Successfully'], 200);
    } 
}
