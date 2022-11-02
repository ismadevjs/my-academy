<?php

namespace App\Http\Controllers;

use App\Models\Mawad;
use App\Models\Sanawat;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function types() {
        $types = Type::latest()->paginate(25);
        $mawads = Mawad::all();
        $sanawats = Sanawat::all();
        return view ('admin.types.types', compact('types', 'mawads', 'sanawats'));
    }
    public function typesPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'mawad_id' => 'required'
        ]);

        if($request->mawad_id == "-") return back()->withErrors('you should select mawad');
        
        $data['name'] = $request->name;
        $data['mawad_id'] = $request->mawad_id;

        $type = Type::where('name', $request->name)->where('mawad_id', $request->mawad_id)->first();

        if ($type) return back()->withErrors('type already existed');

        Type::create($data);

        return back()->withErrors('Data inserted');
    }
    public function typesEdit(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        
        $data['name'] = $request->name;
        if($request->mawad_id != "-")  $data['mawad_id'] = $request->mawad_id;
        
        $type = Type::find($request->id);
        
        $type->update($data);

        return back()->withErrors('Data updated');
    }
    public function typesDelete(Request $request) {
        $type = Type::find($request->id);
        if(!$type) return back()->withErrors('Somthing went wrong');
        $type->delete();
        return back()->withErrors($type->name . ' deleted');
    }
    public function typesDeleteAll(Request $request) {
        Type::truncate();
        return back()->withErrors('ALL deleted');
    }
}
