<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_list;
use App\Models\Student;
use App\Models\Teacher;

class ClassController extends Controller
{
    public function index(){
        $class = Class_list::all();
        return view('class-list', compact('class'));
    }
}
