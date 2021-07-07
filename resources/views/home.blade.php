@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row">
            <div class = "col-md-4">
                <div class = "card">
                    <div class = "card-header">User Dashboard</div>
                    {{--<div class="card-body">--}}
                    {{--</div>--}}
                </div>
                <ul class = "list-group">
                    <li class = "list-group-item d-flex justify-content-between align-items-center">
                        Checkups
                        <span class = "badge badge-primary badge-pill">2</span>
                    </li>
                    <li class = "list-group-item d-flex justify-content-between align-items-center">
                        Surgery
                        <span class = "badge badge-primary badge-pill">1</span>
                    </li>
                    <li class = "list-group-item d-flex justify-content-between align-items-center">
                        Surgery
                        <span class = "badge badge-primary badge-pill">1</span>
                    </li>
                    <li class = "list-group-item d-flex justify-content-between align-items-center">
                        Maternal Health
                        <span class = "badge badge-primary badge-pill">1</span>
                    </li>
                    <li class = "list-group-item d-flex justify-content-between align-items-center">
                        Maternal Health
                        <span class = "badge badge-primary badge-pill">1</span>
                    </li>
                    <li class = "list-group-item d-flex justify-content-between align-items-center">
                        Dental
                        <span class = "badge badge-primary badge-pill">1</span>
                    </li>
                    <li class = "list-group-item d-flex justify-content-between align-items-center">
                        Opticial
                        <span class = "badge badge-primary badge-pill">1</span>
                    </li>
                </ul>
            </div>
            <div class = "col-md-8">
                <div class = "card">
                    <div class = "card-header">Appointments
                        <button type = "button"
                                class = "btn btn-sm btn-outline-success"
                                data-toggle = "modal" data-target = "#addAppointmentModal"
                        >
                            Add Appointment
                        </button>
                    </div>

                    <div class = "card-body">
                        @if (session('status'))
                            <div class = "alert alert-success" role = "alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class = "table table-hover">
                            <thead>
                            <tr>
                                <th scope = "col">Name</th>
                                <th scope = "col">Time</th>
                                <th scope = "col">Doctor</th>
                                <th scope = "col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope = "row">Default</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>


                    <div class="modal" id="addAppointmentModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Book Appointment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{!! route('appointments.store') !!}">
                                        @csrf
                                        <fieldset>
                                            <fieldset class="form-group">
                                                <label for="exampleSelect1">Type</label>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="appointment_type" id="optionsRadios1" value="1" checked="">
                                                        Executive
                                                    </label>
                                                    &nbsp;   &nbsp;   &nbsp;
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="appointment_type" id="optionsRadios2" value="2">
                                                        Economy
                                                    </label>
                                                </div>
                                            </fieldset>
                                            <div class="row">
                                                <div class="form-group col-md-7">
                                                    <label for="exampleSelect1">Doctor</label>
                                                    <select class="form-control" id="exampleSelect1" name="doctor_id">
                                                        @foreach($doctors as $doctor)
                                                         <option value="{!! $doctor->id !!}">Dr {!! $doctor->user->fullname !!}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="exampleSelect1">Time</label>
                                                    <input type="date" class="form-control" placeholder="Title" id="date" name="date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="inputDefault">Title</label>
                                                <input type="text" class="form-control" placeholder="Title" id="title" name="title">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea">Description</label>
                                                <textarea class="form-control" id="description" name="description" placeholder="Brief description..." rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type = "hidden" name="patient_id" value="{!! auth()->id() !!}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-info">Submit</button>
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
