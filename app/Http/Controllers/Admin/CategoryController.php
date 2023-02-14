<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories= Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function products($id)
    {
        $category = Category::find($id);
        $products = $category->products;

        return view('admin.categories.products', compact('category', 'products'));
    }
}
