<?php

namespace App\Models;

use App\Models\BoardingHouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bonus extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function boardingHouse(){
        return $this->belongsTo(BoardingHouse::class);
    }
}
