<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $trendingProducts = Product::where('trending', 1)->latest()->take(10)->get();
        $newArrivalProducts = Product::latest()->take(14)->get();
        $featuredProducts = Product::where('featured','1')->latest()->take(14)->get();
        return view('frotend.index', compact('sliders', 'trendingProducts','newArrivalProducts','featuredProducts'));
    }

    public function newArrivals()
    {
        $newArrivalProducts = Product::latest()->take(16)->get();
        
        return view('frotend.pages.new-arrival', compact('newArrivalProducts'));
    }
    public function featuredProduct()
    {
        $featuredProduct = Product::where('featured','1')->latest()->get();
        
        return view('frotend.pages.new-featured', compact('featuredProduct'));
    }
    
    public function categories()
    {
        $categories = Category::where('status', '0')->get();

        return view('frotend.collections.categories.index')->with(['categories' => $categories]);
    }

    public function products(string $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            return view('frotend.collections.products.index', ['category' => $category]);
        } else {
            return redirect()->back();
        }
    }

    public function productView($category_slug, $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            $product = $category->product()->where('slug', $product_slug)->where('status', '0')->first();

            if ($product) {
                return view('frotend.collections.products.view', ['products' => $product, 'category' => $category]);
            } else {
                return redirect()->back();
            }

        } else {
            return redirect()->back();
        }
    }

    public function thankyou()
    {
        return view('frotend.thank-you');
    }

    public function searchProduct(Request $request)
    {
       if($request->search){
          
          $searchProduct = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(10);
          return view('frotend.pages.searchbar',compact('searchProduct'));
       }
       else{
             return redirect()->back()->with('message','No Search Product Found');
        }
    }
}
