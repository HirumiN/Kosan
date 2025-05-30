<?php

namespace App\Http\Controllers;

use App\Interface\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Interface\BoardingHouseRepositoryInterface;

class CategoryController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        CategoryRepositoryInterface $categoryRepository
    ){
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug){
        $boardingHouses = $this->boardingHouseRepository->getBoardingHousesByCategorySlug($slug);
        $category = $this->categoryRepository->getCategoryBySlug($slug);

        return view('pages.category.show', compact('boardingHouses', 'category'));
    }
}
