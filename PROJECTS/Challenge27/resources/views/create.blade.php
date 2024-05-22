{{-- resources/views/create.blade.php --}}

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
    <h2>Create Vehicle</h2>
    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" class="form-control" id="brand" name="brand">
        </div>
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control" id="model" name="model">
        </div>
        <div class="form-group">
            <label for="plate_number">Plate Number:</label>
            <input type="text" class="form-control" id="plate_number" name="plate_number">
        </div>
        <div class="form-group">
            <label for="insurance_date">Insurance Date:</label>
            <input type="date" class="form-control" id="insurance_date" name="insurance_date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
