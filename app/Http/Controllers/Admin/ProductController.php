<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->price = $request->price;
        $product->text = $request->description;
        $product->category_id = $request->category_id;
        $product->image = $request->img->store('/image');
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('admin.products.edit', compact('categories', 'product'));
    }

    public function update($id,Request $request)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->price = $request->price;
        $product->text = $request->description;
        $product->category_id = $request->category_id;
        $product->image = $request->img->store('/image');
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
