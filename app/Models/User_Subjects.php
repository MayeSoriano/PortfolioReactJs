<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Subjects extends Model
{
    use HasFactory;
    protected $table = "user__subjects";
    public $timestamps = false;
    protected $fillable = ['user_id','subject_id'];
}
