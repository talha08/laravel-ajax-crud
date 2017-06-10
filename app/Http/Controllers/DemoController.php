<?php

namespace App\Http\Controllers;

use App\Demo;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function addItem(Request $request)
    {
        $rules = array(
            'name' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessage()->toArray(),
            ));
        } else {
            $data = new Demo();
            $data->name = $request->name;
            $data->save();
            return response()->json($data);
       }
    }


    public function readItems(Request $req)
    {
        $data = Demo::all();
        return view('welcome')->withData($data);
    }


    public function editItem(Request $req)
    {
        $data = Demo::find($req->id);
        $data->name = $req->name;
        $data->save();
        return response()->json($data);
    }


    public function deleteItem(Request $req)
    {
        Demo::find($req->id)->delete();
        return response()->json();
    }


}
