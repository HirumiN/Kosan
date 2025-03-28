<?php

namespace App\Models;

use App\Models\BoardingHouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [''];

    public function boardingHouse(){
        return $this->belongsTo(BoardingHouse::class);
    }
    public function images(){
        return $this->hasMany(RoomImage::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
