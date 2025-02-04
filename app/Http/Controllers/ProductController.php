<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Get selected category
        $categoryId = $request->get('category');
        
        // Get all categories for the dropdown
        $categories = Category::all();
        
        // Retrieve products, filter by category if selected
        $products = Product::when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();
        
        return view('shoppers.home', compact('products', 'categories'));
    }
    public function selectProduct(Request $request)
    {
        // Validate product selection
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Store selected product in session
        session(['selected_product' => $request->product_id]);

        return redirect()->route('product.selected');
    }
    // Function to show the selected product
    public function showSelectedProduct()
    {
        $product_id = session('selected_product');
        
        if ($product_id) {
            $product = Product::find($product_id);
            return view('shoppers.selected', compact('product'));
        }

        return redirect()->route('shoppers.home')->with('error', 'No product selected');
    }
    
}
