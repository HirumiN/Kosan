<?php

namespace App\Models;

use App\Models\City;
use App\Models\Room;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardingHouse extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function bonuses(){
        return $this->hasMany(Bonus::class);
    }
    public function testimonial(){
        return $this->hasMany(Testimonial::class);
    }
    public function transacttions(){
        return $this->hasMany(Transaction::class);
    }
}
