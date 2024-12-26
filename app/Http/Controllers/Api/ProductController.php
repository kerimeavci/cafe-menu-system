<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $userId = auth()->id();

            $products = Product::where('user_id', $userId)->get();

            return view('admin.product.products', compact('products'));
        } else {
            return redirect()->route('login')->with('error', 'Lütfen önce giriş yapın.');
        }
    }

        public function create(){
        $main_categories = Category::all();
             return view('admin.product.create',[
                 'main_categories' => $main_categories
             ]);
        }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:1,0',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug ?? \Str::slug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->status = $request->status;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->back()->with('success', 'Ürün başarıyla eklendi.');

    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $request->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:1,0',
        ]);

        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->slug = $request->slug ?? Str::slug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->status = $request->status;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->back()->with('success', 'Ürün başarıyla güncellendi.');

    }


    public function delete(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Ürün başarıyla silindi.');
    }
}
