<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function dashboard(){
        return view('students.dashboard');
    }
}
