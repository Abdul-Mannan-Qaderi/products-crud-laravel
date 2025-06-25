<?php

namespace App\Http\Controllers;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);   
        return view('category.category-list', compact('categories'));
    }
}
