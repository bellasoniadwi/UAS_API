<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Products::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $harga = $request->input('harga');
        $kategori = $request->input('kategori');

        $product = Products::create([
            'name' => $name, 
            'harga' => $harga, 
            'kategori' => $kategori
        ]);
        return response()->json([
            'data' => new ProductResource($product)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $name = $request->input('name');
        $harga = $request->input('harga');
        $kategori = $request->input('kategori');

        $product->update([
            'name' => $name, 
            'harga' => $harga, 
            'kategori' => $kategori
        ]);

        return response()->json([
            'data' => new ProductResource($product)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
