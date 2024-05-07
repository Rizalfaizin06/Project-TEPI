<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(StudentGroup::class);
    }

    public function category()
    {
        return $this->belongsTo(StudentGroupCategorie::class);
    }
}
