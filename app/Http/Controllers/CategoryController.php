<?php

namespace App\Http\Controllers;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);   
        return view('category.category-list', compact('categories'));
    }
}
