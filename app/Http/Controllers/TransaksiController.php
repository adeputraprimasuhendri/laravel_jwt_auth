<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\TransaksiModel;

class TransaksiController extends Controller
{
    public function index(){
        $data = DB::table('transaksi')
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
        
        $data = DB::table('transaksi')
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
        $produk = $request->input('produk');
        $qty = $request->input('qty');
        $harga = $request->input('harga');
        $tipe = $request->input('tipe');

        $data = new TransaksiModel();
        $data->session = $session;
        $data->produk = $produk;
        $data->qty = $qty;
        $data->harga = $harga;
        $data->tipe = $tipe;
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
        $produk = $request->input('produk');
        $qty = $request->input('qty');
        $harga = $request->input('harga');
        $tipe = $request->input('tipe');

        $data = DB::table('transaksi')
        ->where('id', $id)
        ->update([
            'session' => $session,
            'produk' => $produk,
            'qty' => $qty,
            'harga' => $harga,
            'tipe' => $tipe
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
        $data = DB::table('transaksi')
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
