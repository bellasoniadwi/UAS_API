<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberResource;
use App\Models\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MemberResource::collection(Members::all());
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
        $alamat = $request->input('alamat');
        $telepon = $request->input('telepon');
        $usia = $request->input('usia');

        $member = Members::create([
            'name' => $name, 
            'alamat' => $alamat, 
            'telepon' => $telepon,
            'usia' => $usia
        ]);
        return response()->json([
            'data' => new MemberResource($member)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Members $member)
    {
        return new MemberResource($member);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Members $member)
    {
        $name = $request->input('name');
        $alamat = $request->input('alamat');
        $telepon = $request->input('telepon');
        $usia = $request->input('usia');

        $member->update([
            'name' => $name, 
            'alamat' => $alamat, 
            'telepon' => $telepon,
            'usia' => $usia
        ]);

        return response()->json([
            'data' => new MemberResource($member)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($name)
    {
        $member = Members::where('name', $name)->first();

        $member->delete();
        return response()->json(null, 204);
    }
}
