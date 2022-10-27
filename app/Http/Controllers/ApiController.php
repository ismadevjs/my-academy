<?php

namespace App\Http\Controllers;

use App\Models\Mawad;
use App\Models\Sanawat;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Taalim;
use App\Models\Type;

class ApiController extends Controller
{
    public function taalim() {
        $api = Taalim::all();
        return response()->json($api, 200);
    }
    public function sanawat($id) {
        $api = Sanawat::where('taalim_id', $id)->with('taalim')->get();
        return response()->json($api, 200);
    }
    public function mawad($id) {
        $api = Mawad::where('sanawat_id', $id)->with('sanawatss')->get();
        return response()->json($api, 200);
    }
    public function type($id) {
        $api = Type::where('mawad_id', $id)->with('mawad')->get();
        return response()->json($api, 200);
    }
    public function subject($id, $type) {
        $api = Subject::where('mawad_id', $id)->where('type_id', $type)->with('mawad')->get();
        return response()->json($api, 200);
    }

}
