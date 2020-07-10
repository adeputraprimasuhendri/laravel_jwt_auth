<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $produk = DB::table('produk')
        ->select('produk.id', 'produk.nama', 'produk.harga_beli', 'produk.harga_jual', 'produk.stok', 'produk.barcode', 'produk.gambar', 'kategori.nama as kategori', 'merek.nama as merek', 'rak.nama as rak')
        ->leftJoin('kategori', 'kategori.id', '=', 'produk.kategori')
        ->leftJoin('merek', 'merek.id', '=', 'produk.merek')
        ->leftJoin('rak', 'rak.id', '=', 'produk.rak')
        ->get();
        return response()->json($produk);
    }
    public function detail($id){
        $data = DB::table('produk')
        ->where('id', $id)
        ->get();
        return response()->json($data);
    }
    public function create(Request $request){
        $kategori = $request->input('kategori');
        $merek = $request->input('merek');
        $rak = $request->input('rak');
        $nama = $request->input('nama');
        $gambar = $request->input('gambar');
        $keterangan = $request->input('keterangan');
        $harga_beli = $request->input('harga_beli');
        $harga_jual = $request->input('harga_jual');
        $stok = $request->input('stok');
        $barcode = $request->input('barcode');

        $data = new ProdukModel();
        $data->kategori = $kategori;
        $data->merek = $merek;
        $data->rak = $rak;
        $data->nama = $nama;
        $data->gambar = $gambar;
        $data->keterangan = $keterangan;
        $data->harga_beli = $harga_beli;
        $data->harga_jual = $harga_jual;
        $data->stok = $stok;
        $data->barcode = $barcode;
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
        $kategori = $request->input('kategori');
        $merek = $request->input('merek');
        $rak = $request->input('rak');
        $nama = $request->input('nama');
        $gambar = $request->input('gambar');
        $keterangan = $request->input('keterangan');
        $harga_beli = $request->input('harga_beli');
        $harga_jual = $request->input('harga_jual');
        $stok = $request->input('stok');
        $barcode = $request->input('barcode');
        $data = DB::table('produk')
        ->where('id', $id)
        ->update([
            'kategori' => $kategori,
            'merek' => $merek,
            'rak' => $rak,
            'nama' => $nama,
            'gambar' => $gambar,
            'keterangan' => $keterangan,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'stok' => $stok,
            'barcode' => $barcode,
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
    public function delete(Request $request){
        $id = $request->input('id');
        $data = DB::table('produk')
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
