<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id', 0)->take(6)->get();
        $products = Product::latest()->take(9)->get();
        $productRecommend = Product::latest('view_count','desc')->take(12)->get();
        $categorylimit = Category::where('parent_id', 0)->take(2)->get();
        return view('home.home', compact('sliders','categories','products','productRecommend','categorylimit'));
        // return view('home');
    }


}
