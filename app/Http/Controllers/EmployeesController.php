<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EmployeeResource::collection(Employees::all());
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
        $email = $request->input('email');
        $telepon = $request->input('telepon');
        $jabatan = $request->input('jabatan');

        $employee = Employees::create([
            'name' => $name, 
            'email' => $email, 
            'telepon' => $telepon,
            'jabatan' => $jabatan
        ]);
        return response()->json([
            'data' => new EmployeeResource($employee)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employee)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $telepon = $request->input('telepon');
        $jabatan = $request->input('jabatan');

        $employee->update([
            'name' => $name, 
            'email' => $email, 
            'telepon' => $telepon,
            'jabatan' => $jabatan
        ]);

        return response()->json([
            'data' => new EmployeeResource($employee)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($name)
    {
        $employee = Employees::where('name', $name)->first();

        $employee->delete();
        return response()->json(null, 204);
    }
}
