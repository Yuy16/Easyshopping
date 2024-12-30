<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Add this line

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
        return view('admin.create');
    }

    // Handle the form submission and store the product
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the uploaded image
        $imagePath = $request->file('image')->store('product_images', 'public');

        // Create the product in the database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image_path' => $imagePath,
            'is_active' => true, // New product is active by default
        ]);

        // Redirect to the form with a success message
        return redirect()->route('admin.create')->with('success', 'Product added successfully!');
    }

    // Display the list of products in the catalog
    public function catalog()
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Pass the products to the catalog view
        return view('admin.catalog', compact('products'));
    }

    // Display the form to edit an existing product
    public function edit($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Return the view with the product details to edit
        return view('admin.edit', compact('product'));
    }

    // Handle the form submission and update the product
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional on update
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // If a new image is uploaded, store it
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image_path = $imagePath;
        }

        // Update the product details
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        // Redirect to the catalog with a success message
        return redirect()->route('admin.catalog')->with('success', 'Product updated successfully!');
    }

    // Delete a product
    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Delete the product image from storage (if it exists)
        if ($product->image_path) {
            Storage::delete('public/' . $product->image_path); // Use the Storage facade here
        }

        // Delete the product from the database
        $product->delete();

        // Redirect to the catalog with a success message
        return redirect()->route('admin.catalog')->with('success', 'Product deleted successfully!');
    }
}
