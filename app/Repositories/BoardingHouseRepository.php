<?php

namespace App\Repositories;

use App\Models\BoardingHouse;
use App\Interface\BoardingHouseRepositoryInterface;
use Filament\Forms\Components\Builder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {

        $query = BoardingHouse::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($city) {
            $query->whereHas('city', function (Builder $query) use ($city) {
                $query->where('slug', $city);
            });
        }

        if ($category) {
            $query->whereHas('category', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            });
        }
        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5){
        return BoardingHouse::withCount('transactions')->orderBy('transactions_count', 'desc')->take($limit)->get();
    }

    public function getBoardingHousesByCitySlug($slug){
        return BoardingHouse::whereHas('city', function(Builder $query) use ($slug){
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHousesByCategorySlug($slug){
        return BoardingHouse::whereHas('category', function(Builder $query) use ($slug){
            $query->where('slug', $slug);
        })->get();
    }
    public function getBoardingHousesBySlug($slug){
        return BoardingHouse::where('slug', $slug)->first();
    }
}
