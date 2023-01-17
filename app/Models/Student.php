<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['student_id','teacher_id','class_id','contact_no','address','image'];

    public function studentInfo(){

        return $this->belongsTo(User::class,'student_id','id');

    }
    public function whichClass(){

        return $this->belongsTo(Class_list::class,'class_id','id');

    }
    public function whichTeacher(){

        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }
}
