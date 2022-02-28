<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerMeta;

class CustomerMetaController extends Controller
{

    public function index()
    {
        // Get All CustomerMeta
        // get All CustomerMeta From Database
        $data = CustomerMeta::all();
        return response()->json(['status'=>'success', 'message'=>'All Customer-meta List ', 'data'=>$data], 200);

    }


    public function store(Request $request)
    {
        // echo '<pre>'; 
        // print_r($request->all());
        // exit; 

        $data = new CustomerMeta();
        $data->cusotmer_id = $request->cusotmer_id;
        $data->meta_key = $request->meta_key;
        $data->meta_value = $request->meta_value;
        $data->save();
        
        return response()->json(['status'=>'success', 'message'=>'Customer-meta Created Successfully', 'data'=>$data], 200);

    }


/*    public function show($id)
    {
        // GET(id)
        // show each product by its ID from database
        $product = Product::find($id);
        return response()->json($product);
    }*/


/*    public function update(Request $request, $id)
    {
        // PUT(id)
        // Update Info by Id

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'price' => 'required'
         ]);

        $product = Product::find($id);


        // image upload
        if($request->hasFile('photo')) {

            $allowedfileExtension=['pdf','jpg','png'];
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $check = in_array($extenstion, $allowedfileExtension);

            if($check){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $product->photo = $name;
            }
            }
        // text Data
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        $product->save();

        return response()->json($product);

    }*/


    /*public function destroy($id)
    {
        // DELETE(id)
        // Delete by Id
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product Deleted Successfully');

    }*/
}
