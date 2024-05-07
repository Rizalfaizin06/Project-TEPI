<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroupCategorie extends Model
{
    use HasFactory;

    public function student_group()
    {
        return $this->hasMany(StudentGroup::class);
    }
}
