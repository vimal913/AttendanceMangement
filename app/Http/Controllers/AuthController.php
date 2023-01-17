<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Hash;
use Session;

use App\Models\User;
use App\Models\Student;
use App\Models\Class_list;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    public function registration(){
        return view('registration');
        
    }

    public function validate_registration(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // 'password' => 'required|min:6',
            'address' => 'required',
            'contact' => 'required',
            'gender' => 'required',
            'profile-pic' => 'required',
            'class' => 'required',
        ]);

        $data=$request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]); 
        return redirect('login')->with('success','Registration completed,Now u Login');
    }

    public function validate_LOGIN(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // if(!Auth::attempt(['email'=>$request->email, 'password' => $request->password],$request->remember)){
        //     return back()->with('error','Invalid Details');
        // }
        $credential = $request->only('email','password');
        if(Auth::attempt($credential,$request->remember)){
            return redirect('dashboard');
        }

        return redirect('login')->with('error','Login credentials are Invalid');
    }
    
    public function dashboard(){
        if(Auth::check()){
            $student = Student::all();
            $class = Class_list::all();
            $teacher = Teacher::all();

            return view('dashboard', compact('student','class','teacher'));
        }
        return redirect('login')->with('error','You are Danger Person so not Allowed');
    }

    public function logout(){
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
