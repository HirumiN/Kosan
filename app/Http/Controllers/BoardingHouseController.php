<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interface\CityRepositoryInterface;
use App\Interface\CategoryRepositoryInterface;
use App\Interface\BoardingHouseRepositoryInterface;

class BoardingHouseController extends Controller
{
    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function show($slug){
        $boardingHouses = $this->boardingHouseRepository->getBoardingHousesBySlug($slug);

        return view('pages.boarding-house.show', compact('boardingHouses'));
    }

    public function rooms($slug){
        $boardingHouses = $this->boardingHouseRepository->getBoardingHousesBySlug($slug);

        return view('pages.boarding-house.rooms', compact('boardingHouses'));
    }

    public function find(){
        $cities = $this->cityRepository->getAllCities();
        $categories = $this->categoryRepository->getAllCategories();
        return view('pages.boarding-house.find', compact('cities', 'categories'));
    }

    public function findResult(Request $request){
        // dd($request->all());

        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses($request->search, $request->city, $request->category);
        return view('pages.boarding-house.find-result', compact('boardingHouses'));
    }
}
