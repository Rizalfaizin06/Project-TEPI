<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAccess extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function group_category()
    {
        return $this->belongsTo(StudentGroupCategorie::class, 'group_id');
    }
    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
