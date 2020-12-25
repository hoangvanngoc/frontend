<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Userct;

class CategoryController extends Controller
{
    public function index($slug, $categoryID)
    {

        $categorylimit = Category::where('parent_id', 0)->take(2)->get();
        $products = Product::where('category_id',$categoryID)->paginate(12);
        $categories = Category::where('parent_id', 0)->take(6)->get();
        $users = Userct::where('status',1)->get();
       return view('product.category.list', compact('categorylimit','products','categories','users'));
    }
}
