<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
use App\Models\AtelierType;
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
        $ateliers = Atelier::latest()->paginate(25);
        $ateliertypes = AtelierType::all();
        return view('admin.atelier.atelier',compact('ateliers', 'ateliertypes'));
    }
    public function atelierAdd(Request $request){
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'type' => 'required'
        ]);

        if($request->file('icon')->extension() !== 'png') {
            if($request->file('icon')->extension() !== 'jpg') {
                return back()->withErrors('Please insert valid image format');
            }
        }

        if($request->type == '-') return back()->withErrors('Please choose type');

        $atelier = Atelier::where('name', $request->name)->first();

        if ($atelier) return back()->withErrors('Atelier already in our records');

        Atelier::create([
            'name' => $request->name,
            'icon' => img($request, 'icon'),
            'type' => json_encode($request->type)
        ]);


        return back()->withErrors('Data inserted');

    }

    public function atelierDelete(Request $request) {

        $atelier = Atelier::find($request->id);
        if(!$atelier) return back()->withErrors('Somthing went wrong');
        // lazam nzid naaraf beli atelier maandhach childs li houma course wela niv
        $atelier->delete();
        return back()->withErrors($atelier->name . ' deleted');
    }

    public function atelierDeleteAll(Request $request) {
 
        Atelier::truncate();
        return back()->withErrors('ALL deleted');
    }

    public function atelierTypeAdd(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $atelierType = AtelierType::where('name', $request->name)->first();

        if ($atelierType) return back()->withErrors('Atelier Type already in our records');

        AtelierType::create([
            'name' => $request->name
        ]);


        return back()->withErrors('Data inserted');
    }


}
