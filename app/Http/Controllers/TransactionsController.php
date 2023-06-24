<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TransactionResource::collection(Transactions::all());
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
        $product = $request->input('product');
        $total = $request->input('total');

        $transaction = Transactions::create([
            'name' => $name, 
            'product' => $product, 
            'total' => $total
        ]);
        return response()->json([
            'data' => new TransactionResource($transaction)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transactions $transaction)
    {
        return new TransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transactions $transaction)
    {
        $name = $request->input('name');
        $product = $request->input('product');
        $total = $request->input('total');

        $transaction->update([
            'name' => $name, 
            'product' => $product, 
            'total' => $total
        ]);

        return response()->json([
            'data' => new TransactionResource($transaction)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transaction)
    {
        $transaction->delete();
        return response()->json(null, 204);
    }
}
