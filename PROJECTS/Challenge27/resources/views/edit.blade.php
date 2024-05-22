@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2>Edit Vehicle</h2>
    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ $vehicle->brand }}" required>
        </div>
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}" required>
        </div>
        <div class="form-group">
            <label for="plate_number">Plate Number:</label>
            <input type="text" class="form-control" id="plate_number" name="plate_number" value="{{ $vehicle->plate_number }}" required>
        </div>
        <div class="form-group">
            <label for="insurance_date">Insurance Date:</label>
            <input type="date" class="form-control" id="insurance_date" name="insurance_date" value="{{ $vehicle->insurance_date->format('Y-m-d') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
