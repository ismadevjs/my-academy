<?php

namespace App\Http\Controllers;

use App\Models\Taalim;
use App\Models\TaalimController as ModelsTaalimController;
use Illuminate\Http\Request;

class TaalimController extends Controller
{
    public function taalim() {
        $taalims = Taalim::latest()->paginate(25);
        return view ('admin.taalim.index', compact('taalims'));
    }
    public function taalimPost(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        
        $data['name'] = $request->name;

        $taalim = Taalim::where('name', $request->name)->first();

        if ($taalim) return back()->withErrors('Taalim already existed');

        Taalim::create($data);

        return back()->withErrors('Data inserted');
    }
    public function taalimEdit(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        
        $data['name'] = $request->name;

        $taalim = Taalim::find($request->id);
        
        $taalim->update($data);

        return back()->withErrors('Data updated');
    }
    public function taalimDelete(Request $request) {
        $taalim = Taalim::find($request->id);
        if(!$taalim) return back()->withErrors('Somthing went wrong');
        // lazam nzid naaraf beli taalim maandhach childs li houma course wela niv
        $taalim->delete();
        return back()->withErrors($taalim->name . ' deleted');
    }
    public function taalimDeleteAll(Request $request) {
        Taalim::truncate();
        return back()->withErrors('ALL deleted');
    }
}
