<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $products = Product::with('category')
            ->when($request->category, function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->where('is_available', true)
            ->get();

        return view('menu.index', compact('categories', 'products'));
    }

    public function show(Product $product)
    {
        $product->load('category');

        return view('menu.show', compact('product'));
    }
}
