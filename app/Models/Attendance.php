<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';
    protected $fillable = ['student_id','session_id','teacher_id','class_id','att_date'];

    public function AstudentInfo(){

        return $this->belongsTo(Student::class,'student_id','id');

    }
    public function AteacherInfo(){

        return $this->belongsTo(Teacher::class,'teacher_id','id');

    }
    // public function AInfo(){

    //     return $this->belongsTo(User::class,'teacher_id','id');

    // }
    public function AwhichClass(){

        return $this->belongsTo(Class_list::class,'class_id','id');

    }
}
