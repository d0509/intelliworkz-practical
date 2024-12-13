<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Plank\Mediable\Facades\MediaUploader;
use App\Http\Requests\Admin\Product\Create;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate();
        return view('admin.pages.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();

        return view('admin.pages.product.create', [
            'categories' => $categories
        ]);
    }

    public function store(Create $request)
    {
        $product = Product::create($request->validated());
        if ($request->hasFile('image')) {
            $media = MediaUploader::fromSource($request->image)
                ->toDisk('public')
                ->toDirectory('product')
                ->upload();

            $product->attachMedia($media, 'product');
        }

        session()->flash('success', 'Product created successfully');
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        return view('admin.pages.product.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.pages.product.create', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }


    public function update(Create $request, Product  $product)
    {
        $product->update($request->validated());

        if ($request->hasFile('image')) {
            $media = MediaUploader::fromSource($request->image)
                ->toDisk('public')
                ->toDirectory('product')
                ->upload();

            $product->syncMedia($media, 'product');
        }

        session()->flash('success','Product Updated Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['success' => true]);
    }
}
