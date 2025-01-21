<?php

namespace App\Models;

use App\Models\Room;
use App\Models\BoardingHouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function boardingHouse(){
        return $this->belongsTo(BoardingHouse::class );
    }
    public function room(){
        return $this->belongsTo(Room::class );
    }
}
