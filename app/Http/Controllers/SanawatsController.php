<?php

namespace App\Http\Controllers;

use App\Models\Sanawat;
use App\Models\Taalim;
use Illuminate\Http\Request;

class SanawatsController extends Controller
{
    public function sanawats() {
        $sanawats = Sanawat::latest()->paginate(25);
        $taalims = Taalim::all();
        return view ('admin.sanawats.sanawats', compact('sanawats', 'taalims'));
    }
    public function sanawatsPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'taalim_id' => 'required'
        ]);

        if($request->taalim_id == "-") return back()->withErrors('you should select taalim');
        
        $data['name'] = $request->name;
        $data['taalim_id'] = $request->taalim_id;

        $sanawat = Sanawat::where('name', $request->name)->where('taalim_id', $request->taalim_id)->first();

        if ($sanawat) return back()->withErrors('sanawat already existed');

        Sanawat::create($data);

        return back()->withErrors('Data inserted');
    }
    public function sanawatsEdit(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        
        $data['name'] = $request->name;

        $sanawat = Sanawat::find($request->id);
        
        $sanawat->update($data);

        return back()->withErrors('Data updated');
    }
    public function sanawatsDelete(Request $request) {
        $sanawat = Sanawat::find($request->id);
        if(!$sanawat) return back()->withErrors('Somthing went wrong');
        // lazam nzid naaraf beli sanawat maandhach childs li houma course wela niv
        $sanawat->delete();
        return back()->withErrors($sanawat->name . ' deleted');
    }
    public function sanawatsDeleteAll(Request $request) {
        Sanawat::truncate();
        return back()->withErrors('ALL deleted');
    }
}
