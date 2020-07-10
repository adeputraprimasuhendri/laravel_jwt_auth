<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MerekModel;

class BrandController extends Controller
{
    public function index(){
        $data = DB::table('merek')
        ->select('id', 'nama as title')
        ->orderBy('nama', 'asc')
        ->get();
        if($data){
            return response()->json($data);
        }else{
            return response()->json([
                'message' => 'Failed',
                'status' => false,
            ]);
        }
    }
    public function detail($id){
        $data = DB::table('merek')
        ->select('id', 'nama as title')
        ->orderBy('nama', 'asc')
        ->where('id', $id)
        ->get();
        if($data){
            return response()->json($data);
        }else{
            return response()->json([
                'message' => 'Failed',
                'status' => false,
            ]);
        }
    }
    public function create(Request $request){
        $title = $request->input('title');
        $data = new MerekModel();
        $data->nama = $title;
        $data->save();
        if($data){
            return response()->json([
                'message' => 'Success',
                'status' => true,
            ]);
        }else{
            return response()->json([
                'message' => 'Failed',
                'status' => false,
            ]);
        } 
    }
    public function update(Request $request){
        $id = $request->input('id');
        $title = $request->input('title');
        $data = DB::table('merek')
        ->where('id', $id)
        ->update([
            'nama' => $title,
        ]);
        if($data){
            return response()->json([
                'message' => 'Success',
                'status' => true,
            ]);
        }else{
            return response()->json([
                'message' => 'Failed',
                'status' => false,
            ]);
        }
    }
    public function delete($id){
        $data = DB::table('merek')
        ->where('id', $id)
        ->delete();
        if($data){
            return response()->json([
                'message' => 'Success',
                'status' => true,
            ]);
        }else{
            return response()->json([
                'message' => 'Failed',
                'status' => false,
            ]);
        }
    }
}
