<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {

            $userId = auth()->id();

            $categories = Category::where('user_id', $userId)->get();
            return view('admin.category.categories', compact('categories'));
        } else {
            return redirect()->route('login')->with('error', 'Lütfen önce giriş yapın.');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:1,0',
        ]);

        $categories = new Category();
        $categories->name = $request->name;
        $categories->slug = $request->slug ?? \Str::slug($request->name);
        $categories->status = $request->status;
        $categories->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $categories->image = $imagePath;
        }

        $categories->save();

        return redirect()->back()->with('success', 'Kategori başarıyla eklendi.');


    }

    public function create()
    {
        $main_categories = Category::all();
        return view('admin.category.create',[
            'main_categories' => $main_categories
        ]);
    }

    public function update(Request $request)
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

        $categories = Category::findOrFail($request->id);
        $categories->name = $request->name;
        $categories->slug = $request->slug ?? \Str::slug($request->name);
        $categories->status = $request->status;
        $categories->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $categories->image = $imagePath;
        }

        $categories->save();

        return redirect()->back()->with('success', 'Ürün başarıyla eklendi.');

    }

    public function delete(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Kategori başarıyla silindi.');

    }
}
