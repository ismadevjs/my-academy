<?php

namespace App\Http\Controllers;

use App\Models\Mawad;
use App\Models\Sanawat;
use Illuminate\Http\Request;

class mawadController extends Controller
{
    public function mawads() {
        $mawads = Mawad::latest()->paginate(25);
        $sanawats = Sanawat::all();
        return view ('admin.mawad.mawad', compact('mawads', 'sanawats'));
    }
    public function mawadsPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'sanawat_id' => 'required'
        ]);

        if($request->sanawat_id == "-") return back()->withErrors('you should select sanawat');
        
        $data['name'] = $request->name;
        $data['sanawat_id'] = $request->sanawat_id;

        $sanawat = Mawad::where('name', $request->name)->where('sanawat_id', $request->sanawat_id)->first();

        if ($sanawat) return back()->withErrors('sanawat already existed');

        Mawad::create($data);

        return back()->withErrors('Data inserted');
    }
    public function mawadsEdit(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        
        $data['name'] = $request->name;
        if($request->sanawat_id != "-")  $data['sanawat_id'] = $request->sanawat_id;
        
        $sanawat = Mawad::find($request->id);
        
        $sanawat->update($data);

        return back()->withErrors('Data updated');
    }
    public function mawadsDelete(Request $request) {
        $sanawat = Mawad::find($request->id);
        if(!$sanawat) return back()->withErrors('Somthing went wrong');
        // lazam nzid naaraf beli sanawat maandhach childs li houma course wela niv
        $sanawat->delete();
        return back()->withErrors($sanawat->name . ' deleted');
    }
    public function mawadsDeleteAll(Request $request) {
        Mawad::truncate();
        return back()->withErrors('ALL deleted');
    }
}
