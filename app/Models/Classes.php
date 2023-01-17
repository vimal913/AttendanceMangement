<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = ['class_name','teacher_id'];

    public function teacherInfo(){

        return $this->belongsTo(Teacher::class,'id','teacher_id');

    }
}
