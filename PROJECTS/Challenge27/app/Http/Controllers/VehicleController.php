<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('dashboard', compact('vehicles'));
    }

    public function show(Vehicle $vehicle)
    {
        return view('show', compact('vehicle'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(VehicleRequest $request)
    {
        Vehicle::create($request->validated());
        return redirect()->route('dashboard')->with('success', 'Vehicle created successfully.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('edit', compact('vehicle'));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());
        return redirect()->route('dashboard')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('dashboard')->with('success', 'Vehicle deleted successfully.');
    }
}
