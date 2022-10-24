<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstimaraController extends Controller
{
    public function step1() {
        return view ('estimara.step1');
    }
}
