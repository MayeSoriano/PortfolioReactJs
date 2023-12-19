<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Subjects extends Model
{
    use HasFactory;
    protected $table = "subjects";
    public $timestamps = false;
    protected $fillable = ['sub_title','sub_room'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user__subjects', 'subject_id', 'user_id');
    }
}
