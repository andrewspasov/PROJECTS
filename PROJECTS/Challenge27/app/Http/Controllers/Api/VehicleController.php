<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleCollection;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        return VehicleResource::collection(Vehicle::all())->additional(['message' => 'List of all vehicles']);
    }


    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle);
    }

    public function store(VehicleRequest $request)
    {
        $vehicle = Vehicle::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'plate_number' => $request->plate_number,
            'insurance_date' => $request->insurance_date,
        ]);
    
        return (new VehicleResource($vehicle))->additional(['message' => 'Vehicle created successfully']);
    }
    

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return (new VehicleResource($vehicle))->additional(['message' => 'Vehicle updated successfully']);
    }


    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return response()->json(['success' => 'Vehicle deleted successfully'], 200);
    }
}
