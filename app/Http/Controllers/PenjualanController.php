<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\PenjualanModel;

class PenjualanController extends Controller
{
    public function index(){
        $data = DB::table('penjualan')
        ->select('id', 'session')
        ->orderBy('created_at', 'desc')
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
        $data = DB::table('penjualan')
        ->select('id', 'session')
        ->orderBy('created_at', 'desc')
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
        $session = $request->input('session');
        $data = new penjualanModel();
        $data->session = $session;
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
        $session = $request->input('session');
        $data = DB::table('penjualan')
        ->where('id', $id)
        ->update([
            'session' => $session,
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
        $data = DB::table('penjualan')
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
