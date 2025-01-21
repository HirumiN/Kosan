<?php

namespace App\Models;

use App\Models\BoardingHouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'slug',
    ];
    public function boardingHouses(){
        return $this->hasMany(BoardingHouse::class);
    }
}
