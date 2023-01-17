<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Class_list;
use App\Models\Teacher;
use App\Models\Attendance;


class AttendanceController extends Controller
{
    public function index(Request $request){
        $studentlist = Student::where('teacher_id',Auth::user()->id)->with('studentInfo','whichTeacher')->get();
        return view('attendance-list',compact('studentlist'));
    }

    public function store(Request $request){
        $position    = $request->student_id;
        $session    = $request->exampleRadios;
        $teacher    = $request->teacher_id;
        $class    = $request->class_id;
        for($count = 0; $count < count($position); $count++)
        {
            $insert = array(                        
                'student_id' => $position [$count],
                'session_id'     => $session[$position [$count]],
                'teacher_id'     =>  $teacher ,
                'class_id'     => $class ,
                'att_date'     => date('Y-m-d'),
            );
            $insert_data[] = $insert; 
        }

        Attendance::insert($insert_data);
        $attendancelist=Attendance::with('AstudentInfo','AwhichClass','AteacherInfo')->get();
        return view('attendance-view', compact('attendancelist'));
    }
    public function views(Request $request){
        // dd('hi');
        $attendancelist=Attendance::with('AstudentInfo','AwhichClass','AteacherInfo')->get();
        // $attendancelist=Attendance::with('many')->get();
        // dd($attendancelist);
        
        return view('attendance-view', compact('attendancelist'));
    }
}
