<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')) {
            $search = $request->input('search');
            $products = Product::where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $products = Product::orderBy('created_at', 'desc')->paginate(10);
        }
        return view('product.product-list', compact('products'));
    }



    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }


     public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,inactive',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }


    public function edit(Product $product) 
    {
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,inactive',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if($request->image && Storage::disk('public')->exists($request->image)) {
                Storage::disk('public')->delete($request->image);
            }
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }
        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
      }


      public function destroy(Product $product)
      {
          if ($product->image && Storage::disk('public')->exists($product->image)) {
              Storage::disk('public')->delete($product->image);
          }
          $product->delete();
          return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
      }

}
