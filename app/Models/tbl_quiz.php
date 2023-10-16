<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_quiz extends Model
{
    use HasFactory;
    protected $table = 'tbl_quizzes';
    protected $fillable = [
        'title',
        'description',
        'date'
    ];
}
