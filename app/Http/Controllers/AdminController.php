<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function estimara(){
        return view('admin.estimara.index');
    }
    public function atelier(){
        return view('admin.atelier.atelier');
    }
    public function atelierAdd(Request $request){
        return $request;
    }
}
