<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
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
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        if($request->file('icon')->extension() !== 'png') {
            if($request->file('icon')->extension() !== 'jpg') {
                return back()->withErrors('Please insert valid image format');
            }
        }

        $atelier = Atelier::where('name', $request->name)->first();

        if ($atelier) return back()->withErrors('Atelier already in our records');

        Atelier::create([
            'name' => $request->name,
            'icon' => img($request, 'icon')
        ]);


        return back()->withErrors('Data inserted');

    }
}
