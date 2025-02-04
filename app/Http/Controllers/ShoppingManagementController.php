<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShoppingManagementController extends Controller
{
    // Display the shopping management page
    public function index()
    {
        return view('shopping-management');
    }

    // Display the form to add a new product
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('admin.create', compact('categories'));
    }

    // Store a new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255', // Fixed validation
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = $request->file('image')->store('product_images', 'public');
    
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description, // Ensure description is saved
            'category_id' => $request->category_id,
            'image_path' => $imagePath,
            'is_active' => true,
        ]);
    
        return redirect()->route('admin.create')->with('success', 'Product added successfully!');
    }
    

    // Display product catalog
    public function catalog()
    {
        $products = Product::with('category')->get();
        return view('admin.catalog', compact('products'));
    }

    // Edit product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Fetch categories for dropdown
        return view('admin.edit', compact('product', 'categories'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255', // Fixed validation
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean', 
        ]);
    
        $product = Product::findOrFail($id);
    
        // Update product information
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description']; // Ensure description is updated
        $product->category_id = $validated['category_id'];
        $product->is_active = $request->has('is_active');
    
        // Handle the image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image_path = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('admin.catalog')->with('success', 'Product updated successfully!');
    }
    

    // Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image_path) {
            Storage::delete('public/' . $product->image_path);
        }

        $product->delete();

        return redirect()->route('admin.catalog')->with('success', 'Product deleted successfully!');
    }
}

