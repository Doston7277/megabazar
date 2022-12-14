<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subject;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($subject_id)
    {
        $categories = Category::query()->where('subject_id', $subject_id)->get();
        $products = Product::query()->where('subject_id', $subject_id)->paginate(5);
        return view('front.product', compact('categories' , 'products'));
    }

    public function detail($product_id)
    {
        $product = Product::query()->find($product_id);

        $products = Product::query()->where('category_id', $product->category_id)->limit(10)->get();

        return view('front.product-detail', compact('product', 'products'));
    }

    public function view($product_id){
        $pro = Product::query()->find($product_id);
        $pro->product_images = asset($pro->product_images);
        return $pro;
    }

    public function search(Request $request){
        $product = Product::query()->where('product_model' , 'LIKE', "%{$request->search}%")
            ->orWhere('product_name' , 'LIKE', "%{$request->search}%")
            ->orWhere('product_company' , 'LIKE', "%{$request->search}%")
            ->orWhere('product_company' , 'LIKE', "%{$request->search}%")->first();
        if ($product != null){
            $subject = Subject::query()->find($product->subject_id);
        }else{
            return back();
        }
        return redirect('/products/'.$subject->subject_route);
    }
}
