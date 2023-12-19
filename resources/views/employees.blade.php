@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="text-center">Employee List</h1>

        <div class="row">
            @forelse($employees as $employee)
                <div class="col-md-3 mb-4">
                    <div class="card crd-ho">
                        <div class="card-body text-center">
                            <img alt="" src="{{-- Add the image URL here --}}"
                                style="width: 150px; height: 200px" class="img-thumlin">
                            <p>ID: {{ $employee->id }}</p>
                            <p>Name: {{ $employee->staff_name }}</p>
                            <p>Designation: {{ $employee->designation }}</p>
                            <p>Phone: {{ $employee->phone }}</p>
                            <p>Email: {{ $employee->email }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No employees found.</p>
            @endforelse
        </div>
    </div>


@endsection