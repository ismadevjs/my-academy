<?php

namespace App\Http\Controllers;

use App\Models\Mawad;
use App\Models\Subject;
use App\Models\Type;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function subjects() {
        $types = Type::all();
        $mawads = Mawad::all();
        $subjects = Subject::latest()->paginate(25);
        return view ('admin.subjects.subjects', compact('subjects', 'types', 'mawads'));
    }
    public function subjectsPost(Request $request) {


        $request->validate([
            'name' => 'required',
            'mawad_id' => 'required',
            'type_id' => 'required',
            'file' => 'required'
        ]);

        if($request->mawad_id == "-") return back()->withErrors('you should select mawad');
        if($request->type_id == "-") return back()->withErrors('you should select type');
        if($request->mawad_id == "") return back()->withErrors('you should not be empty');
        if($request->type_id == "") return back()->withErrors('you should not be empty');
        
          if($request->file('file')->extension() !== 'pdf') {
                return back()->withErrors('Please insert valid pdf format');
         }

        // collecting data in data

        $data['name'] = $request->name;
        $data['mawad_id'] = $request->mawad_id;
        $data['type_id'] = $request->type_id;
        $data['year'] = $request->year;
        $data['file'] = img($request, 'file', 'file');


        $subject = Subject::where('name', $request->name)->where('mawad_id', $request->mawad_id)->where('type_id', $request->type_id)->where('year', $request->year)->first();

        if ($subject) return back()->withErrors('Subject already existed');

        Subject::create($data);

        return back()->withErrors('Data inserted');
    }
    public function subjectsEdit(Request $request) {
        $request->validate([
            'name' => 'required',
            'mawad_id' => 'required',
            'type_id' => 'required',
        ]);

       
        if($request->mawad_id != "-") $data['mawad_id'] = $request->mawad_id;
        if($request->type_id !=  "-") $data['type_id'] = $request->type_id;
        
        
        if($request->file != null) {
            if($request->file('file')->extension() !== 'pdf') {
                    return back()->withErrors('Please insert valid Pdf format');
            }
            $data['file'] = img($request, 'file', 'file');
        }

        // collecting data in data

        $data['name'] = $request->name;
        $data['year'] = $request->year;
        

        $subject = Subject::find($request->id);

        if ($subject) {
            $subject->update($data);
        } else {
            return back()->withErrors('Somthing went wrong');
        }


        return back()->withErrors('Data updated');
    }
    public function subjectsDelete(Request $request) {
        $subject = Subject::find($request->id);
        if(!$subject) return back()->withErrors('Somthing went wrong');
        $subject->delete();
        return back()->withErrors($subject->name . ' deleted');
    }
    public function subjectsDeleteAll(Request $request) {
        Subject::truncate();
        return back()->withErrors('ALL deleted');
    }
}
