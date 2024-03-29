<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function index_create()
    {
        return view('admin.product.create');
    }

    public function create(Request $request)
    {
        $product = new Product();

        $product->subject_id = $request->subject_id;
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_model = $request->product_model;
        $product->product_company = $request->product_company;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        for($i = 0; $i < count($request->product_nature_value); $i++)
        {
            $da['uz'] = $request->product_nature_title['uz'][$i];
            $da['ru'] = $request->product_nature_title['ru'][$i];
            $da['en'] = $request->product_nature_title['en'][$i];
            $data['title'] =  $da;
            $data['value'] =  $request->product_nature_value[$i];
            $dat [] = $data;
        }
        $product->product_nature = $dat;
        $product->product_images = session('product_image');

        if ($product->save()){
            return response()->json([
                "success" => true,
                "message" => __('Admin.saved')
            ]);
        }
    }

    public function update(Request $request)
    {
        $product = Product::query()->find($request->product_id);

        $product->subject_id = $request->subject_id;
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_model = $request->product_model;
        $product->product_company = $request->product_company;
        $product->product_price = $request->product_price;
        // if (session('product_image') != null){
        //     $product->product_images = session('product_image');
        // }

        if ($product->save()){
            return response()->json([
                "success" => true,
                "message" => __('Admin.updated')
            ]);
        }
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('product_image')){
            $filename = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('images/product/'), $filename);
            session(['product_image' => 'images/product/'.$filename]);
        }
    }

    public function datatable(Request $request)
    {
        $model = Product::query()->with(['subject', 'category']);
        return (new \Yajra\DataTables\DataTables)->eloquent($model)
            ->addIndexColumn()
            ->addColumn('image', function ($product){
                $url = asset($product->product_images);
                return $url;
            })
            ->addColumn('id', function ($product){
                return $product->product_id;
            })
            ->addColumn('subject', function ($product){
                return $product->subject->subject_name[app()->getLocale()];
            })
            ->addColumn('category', function ($product){
                return $product->category->category_name[app()->getLocale()];
            })
            ->addColumn('name', function ($product){
                return $product->product_name[app()->getLocale()];
            })
            ->addColumn('model', function ($product){
                return $product->product_model;
            })
            ->addColumn('company', function ($product){
                return $product->product_company;
            })
            ->addColumn('price', function ($product){
                return $product->product_price;
            })
            ->addColumn('action',function ($product){
                if (Auth::user()->is_admin == true){
                    return "<a onclick='updated($product->product_id)' data-toggle=\"modal\" data-target=\"#update\"><i class=\"icon-pencil\"></i></a><a onclick=\"deleted($product->product_id)\"><i class=\"icon-trash\"></i></a>";
                }
            })
            ->make(true);
    }
    public function delete($product_id)
    {
        Product::query()->find($product_id)->delete();
        return response()->json([
            "success" => true,
            "message" => __('Admin.deleted')
        ]);
    }
    public function edit($product_id)
    {
        return Product::query()->find($product_id);
    }
}
