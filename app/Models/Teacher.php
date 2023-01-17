<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Class_list;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = ['teacher_id','class_id','contact_no','address','image'];

    public function teacherInfo(){

        return $this->belongsTo(User::class,'teacher_id','id');

    }
    public function whichClass(){

        return $this->belongsTo(Class_list::class,'class_id','id');

    }
}
