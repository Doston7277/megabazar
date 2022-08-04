<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subject;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {

        $phones = Product::query()->inRandomOrder()->where('subject_id', '1')->limit(10)->get();

        $laptops = Product::query()->inRandomOrder()->where('subject_id', '2')->limit(10)->get();

        $tvaccessories = Product::query()->inRandomOrder()->where('subject_id', '3')->limit(10)->get();

        $trends = Product::query()->inRandomOrder()->limit(10)->get();

        return view('front.index', compact('phones', 'laptops', 'tvaccessories', 'trends'));
    }
}
