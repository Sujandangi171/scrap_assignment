<!-- resources/views/staff/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div>
        @foreach($staffMembers as $staffMember)
            <div>
                <img src="{{ $staffMember->image_url }}" alt="{{ $staffMember->name }}">
                <p>Name: {{ $staffname->name }}</p>
                <p>Designation: {{ $staffMember->designation }}</p>
                <p>Department: {{ $staffMember->department }}</p>
            </div>
        @endforeach
    </div>

    {{ $staffMembers->links() }}
@endsection
