<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);

        return response()->json([
            'products' => $products
            ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);

        $product = Product::create($validated);

        return response()->json([
            'product' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return response()->json([
            'product' => $product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $this->validateProduct($request);

        $product = Product::findOrFail($id);

        $product->update($validated);

        return response()->json([
            'product' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json(
            null, 204
        );
    }

    /**
     * Validate the product data.
     */
    protected function validateProduct(Request $request)
    {
        return $request->validate([
            'name'  => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ], [
            'name.required'  => 'Product name is required.',
            'name.max'       => 'Product name cannot exceed 100 characters.',
            'price.required' => 'Product price is required.',
            'price.numeric'  => 'Product price must be a number.',
            'price.min'      => 'Product price must be at least 0.',
            'stock.required' => 'Product stock is required.',
            'stock.integer'  => 'Product stock must be an integer.',
            'stock.min'      => 'Product stock must be at least 0.',
        ]);
    }
}
