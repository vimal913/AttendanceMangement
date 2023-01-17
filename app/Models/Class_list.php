<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_list extends Model
{
    use HasFactory;
    protected $table = 'class_list';
    protected $fillable = ['class_name'];

    // public function teacherInfo(){

    //     return $this->belongsTo(Teacher::class);

    // }
}
