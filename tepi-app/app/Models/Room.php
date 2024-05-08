<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function facility()
    {
        return $this->hasMany(Facility::class);
    }

    public function room_access()
    {
        return $this->hasMany(RoomAccess::class, 'id', 'room_id');
    }
}
