@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row">
            <div class = "col-md-8"><h3>Appointments</h3></div>
            <div class = "col-md-4">
                <a href = "{!! route('appointments.create') !!}">
                    <button type = "button"
                            class = "btn btn-sm btn-outline-success float-right"
                    >
                        Add New
                    </button>
                </a>
            </div>
            <table class = "table table-hover">
                <thead>
                <tr>
                    <th scope = "col">Title</th>
                    <th scope = "col">Doctor</th>
                    <th scope = "col">Date</th>
                    <th scope = "col">Type</th>
                    <th scope = "col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $appointment)
                    <tr class = "table">
                        <th scope = "row">{!! $appointment->title !!}</th>
                        <td>{!! $appointment->present()->doctor !!}</td>
                        <td>{!! $appointment->present()->appointmentDate !!}</td>
                        <td>{!! $appointment->present()->type !!}</td>
                        <td>{!! $appointment->present()->status !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
