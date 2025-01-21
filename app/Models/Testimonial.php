<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function boardingHouse(){
        return $this->belongsTo(BoardingHouse::class);
    }
}
