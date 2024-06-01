<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filters)
    {
        if (isset($filters) ? $filters : false) {
            return $query->where('title', 'like', '%' . $filters . '%');
        }

    }
    public function scopeFilterState($query, $filters)
    {

        if (isset($filters) ? $filters : false) {
            if ($filters == 'available') {
                return $query->having('room_state', '=', FALSE);
            } else if ($filters == 'unavailable') {
                return $query->having('room_state', '=', TRUE);
            }
        }
    }

    public function facility()
    {
        return $this->hasMany(Facility::class);
    }

    public function room_access()
    {
        return $this->hasMany(RoomAccess::class, 'id', 'room_id');
    }
}
