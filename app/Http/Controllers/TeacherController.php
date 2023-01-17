<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Class;

use Hash;
use Session;
use DB;
class TeacherController extends Controller
{
     /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            $teacherlist=Teacher::with('teacherInfo','whichClass')->get();
            $classes = DB::table('class_list')
                                ->whereNotIn('id', [1, 2, 3, 4])
                                ->get();
            return view('teacher-list',compact('teacherlist','classes'));
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
                'role' => 2,
                'password' => Hash::make(rand(1,10)),
            ]); 

            // $usertable->id();
            // dd($usertable->id);
            $fileName = time().'.'.$request->file->extension();  
         
            $request->file->move(public_path('file'), $fileName);
            Teacher::create([
                'teacher_id' =>$usertable->id,
                'class_id' =>$data['class'],
                'contact_no' =>$data['contact'],
                'address' =>$data['address'],
                'contact_no' =>$data['contact'],
                'image' =>$fileName,
            ]);
            return redirect('teacher')->with('success','Teacher created successfully');
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
            $teacherlist=Teacher::where('id',$id)->with('teacherInfo','whichClass')->get();
            // dd($teacherlist);
            $classes = DB::table('class_list')
                                ->whereNotIn('id', [1, 2, 3, 4])
                                ->get();
            $updateteacher = Teacher::find($id);
            return view('updates.teacher-update', compact('teacherlist','classes', 'updateteacher'));
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
                'email' => 'required|email|unique:users',
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
            $teacherupdate = Teacher::find($id);
            $teacherupdate->contact_no       = $data['contact'];
            $teacherupdate->address      = $data['address'];
            $teacherupdate->image      = $fileName;
            $teacherupdate->save();

            return redirect('teacher')->with('success','Teacher Updated successfully');
        }
    
        /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function destroy(Teacher $teacher)
        {
            $teacher->delete();
            return redirect()->route('teacher.index')->with('success','Teacher has been deleted successfully');
        }
}


