<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RackController extends Controller
{
    public function index(Request $request){
        return 'DAFTAR';
    }
    public function detail($id){
        return 'DETAIL :: '.$id;
    }
    public function create(Request $request){
        return 'CREATE';
    }
    public function update(Request $request){
        return 'UPDATE';
    }
    public function delete(Request $request){
        return 'DELETE';
    }
}
