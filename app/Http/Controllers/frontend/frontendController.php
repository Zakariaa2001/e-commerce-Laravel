<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));

    }
    public function categories()
    {
        $categories = Category::where('status','0')->get();
        return view('frontend.collection.category.index',compact('categories'));

    }
    public function productsByCate($slug) {

        $category = Category::where('slug',$slug)->first();
        if($category) {
            // $products = $category->products()->get();
            return view('frontend.collection.products.index',compact('category'));
        }else {
            return redirect()->back();
        }

    }
    public function productView(string $product_slug) {

       $product = Product::where('slug',$product_slug)->first();
       return view('frontend.collection.products.show',compact('product'));

    }
}