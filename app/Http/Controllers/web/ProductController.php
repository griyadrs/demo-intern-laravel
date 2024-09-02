<?php

namespace App\Http\Controllers\web;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    public function home(): View
    {
        $products = Product::paginate(10);
        return view('products.home', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);
        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function show_demo_data(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.show_demo_data', compact('product'));
    }

    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $this->validateProduct($request);
        $product = Product::findOrFail($id);
        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    protected function validateProduct(Request $request): array
    {
        return $request->validate([
            'name'  => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ], [
            'name.required'  => 'The product name is required.',
            'name.max'       => 'The product name may not exceed 100 characters.',
            'price.required' => 'The product price is required.',
            'price.numeric'  => 'The product price must be a number.',
            'price.min'      => 'The product price must be at least 0.',
            'stock.required' => 'The product stock is required.',
            'stock.integer'  => 'The product stock must be an integer.',
            'stock.min'      => 'The product stock must be at least 0.',
        ]);
    }
}
