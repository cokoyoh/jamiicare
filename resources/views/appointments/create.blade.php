@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <h3>Add/Edit Appointment</h3>
            <form method = "post" action = "{!! route('appointments.store') !!}">
                @csrf
            </form>
            
        </div>
    </div>
@endsection