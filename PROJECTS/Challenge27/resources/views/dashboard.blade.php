@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <h2>Vehicle Dashboard</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Plate Number</th>
                    <th>Insurance Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="vehicle-table-body">
                <!-- vehicles AJAX -->
            </tbody>
        </table>


        <a href="{{ route('vehicles.create') }}" class="btn btn-success mb-3">Create New Vehicle</a>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            let editUrlTemplate = "{{ route('vehicles.edit', ':id') }}";

            fetchVehicles();

            function fetchVehicles() {
                $.ajax({
                    url: '/api/vehicles',
                    type: 'GET',
                    success: function(response) {
                        let vehicleRows = '';
                        response.data.forEach(function(vehicle) {
                            let formattedDate = new Date(vehicle.insurance_date).toLocaleDateString();
                            let editUrl = editUrlTemplate.replace(':id', vehicle.id);

                            vehicleRows += `
                                <tr id="vehicle-row-${vehicle.id}">
                                    <td>${vehicle.id}</td>
                                    <td>${vehicle.brand}</td>
                                    <td>${vehicle.model}</td>
                                    <td>${vehicle.plate_number}</td>
                                    <td>${formattedDate}</td>
                                    <td>
                                        <a href="${editUrl}" class="btn btn-sm btn-primary">Edit</a>
                                        <button onclick="deleteVehicle(${vehicle.id})" class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#vehicle-table-body').html(vehicleRows);
                    }
                });
            }

        });





        function deleteVehicle(id) {
            if (confirm('Are you sure you want to delete this vehicle?')) {
                $.ajax({
                    url: '/api/vehicles/' + id,
                    type: 'DELETE',
                    success: function(result) {
                        console.log('Removing row:', '#vehicle-row-' + id);
                        $('#vehicle-row-' + id).remove();
                        window.location.href = '/dashboard';
                    },
                    error: function(err) {
                        alert('Error');
                    }
                });
            }
        }


    </script>
@endsection