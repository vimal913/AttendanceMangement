<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Class;
use App\Models\Student;

use Hash;
use Session;
use DB;
class StudentController extends Controller
{
     /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            $studentlist=Student::with('studentInfo','whichClass','whichTeacher')->get();
            // dd($studentlist);
            $classes = DB::table('class_list')->get();
            $teachers = DB::table('teachers')->get();
            return view('student-list',compact('studentlist','classes','teachers'));
        }
    
        /**
            * Show the form for creating a new resource.
            *   
            * @return Response
            */
        public function create()
        {
           
        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'address' => 'required',
                'contact' => 'required',
                'file' => 'required',
                'class' => 'required',
            ]);
    // dd($request->file->extension());
            $data=$request->all();
    
           $usertable = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => 3,
                'password' => Hash::make(rand(1,10)),
            ]); 

            // $usertable->id();
            // dd($usertable->id);
            $fileName = time().'.'.$request->file->extension();  
         
            $request->file->move(public_path('file'), $fileName);
            Student::create([
                'student_id' =>$usertable->id,
                'teacher_id' =>$data['teacher'],
                'class_id' =>$data['class'],
                'contact_no' =>$data['contact'],
                'address' =>$data['address'],
                'contact_no' =>$data['contact'],
                'image' =>$fileName,
            ]);
            return redirect('student')->with('success','Teacher created successfully');
        }
    
        /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function show($id)
        {
            //
        }
    
        /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function edit($id)
        {
            $studentlist=Student::where('id',$id)->with('studentInfo','whichClass','whichTeacher')->get();
            // dd($teacherlist);
            $classes = DB::table('class_list')
                                ->get();
            $updatestudent = Student::find($id);
            $teachers = DB::table('teachers')->get();
            return view('updates.student-update', compact('studentlist','classes', 'updatestudent','teachers'));
        }
    
        /**
            * Update the specified resource in storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function update(Request $request, $id)
        {
            // dd('hi');
            
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'contact' => 'required',
                'class' => 'required',
            ]);
            $data=$request->all();

            $shark = User::find($data['userid']);
            $shark->name       = $data['name'];
            $shark->email      = $data['email'];
            $shark->save();
            
            $fileName = time().'.'.$request->file->extension(); 
            $request->file->move(public_path('file'), $fileName);
            $studentupdate = Student::find($id);
            $studentupdate->contact_no       = $data['contact'];
            $studentupdate->address      = $data['address'];
            $studentupdate->image      = $fileName;
            $studentupdate->save();

            return redirect('student')->with('success','student Updated successfully');
        }
    
        /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function destroy(Student $student)
        {
            $student->delete();
            return redirect()->route('student.index')->with('success','Student has been deleted successfully');
        }
}


