<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;

class ReportsController extends Controller
{

    public function index()
    {
        // Get All Reports
        // get All Reports From Database
        $data = Reports::all();
        return response()->json(['status'=>'success', 'message'=>'All Reports List ', 'data'=>$data], 200);

    }


    public function store(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $this->validate($request, [
            'name' => 'required',
            'report_query' => 'required',
            'type' => 'required',
        ]);

        $data = new Reports();
        $data->name = $request->name;
        $data->report_query = $request->report_query;
        $data->type = $request->type;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'Report Created Successfully', 'data'=>$data], 200);

    }


    public function show(Request $request)
    {
        
        // GET(id)
        // show each Reports by its ID from database
        $this->validate($request, [
            'report_id' => 'required',
         ]);

        $data = Reports::find($request->report_id);
        return response()->json(['status'=>'success', 'message'=>'Get Report Details Successfully', 'data'=>$data], 200);
    }

    public function update(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $this->validate($request, [
            'report_id' => 'required',
            'name' => 'required',
            'report_query' => 'required',
            'type' => 'required',
         ]);

        $data = Reports::find($request->report_id);
        $data->name = $request->name;
        $data->report_query = $request->report_query;
        $data->type = $request->type;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'Report Updated Successfully', 'data'=>$data], 200);
    }


    public function destroy(Request $request)
    {
        // DELETE(id)
        // Delete by Id
        $this->validate($request, [
            'report_id' => 'required',
         ]);
        $data = Reports::find($request->report_id);
        $data->delete();
        return response()->json(['status'=>'success', 'message'=>'Report Deleted Successfully'], 200);

    }

    public function deleteMultiple(Request $request)
    {
        
        $all_ids = explode(",",$request->report_id); 
        foreach ($all_ids as $value) {
            $data = Reports::find($value);
            if(empty($data)){
                return response()->json(['status'=>'fail', 'message'=>'Please enter correct ID'], 200);
            }else{
                $data->delete();    
            }
            
        }
        return response()->json(['status'=>'success', 'message'=>'Reports Deleted Successfully'], 200);
    } 
}
