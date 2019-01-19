@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "container justify-content-around">
            <h3>Add/Edit Appointment</h3>
            {!! Form::model($appointment, ['route' => ['appointments.store', $appointment->id]]) !!}

            @include('partials.errors')

            <div class="form-group d-flex form_radio">
                <div class="form_radio_option">
                    {!! Form::label('Economy', null) !!}
                    {!! Form::radio('type', 1, true); !!}
                </div>
                <div class="form_radio_option">
                    {!! Form::label('Executive', null) !!}
                    {!! Form::radio('type', 2); !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('Doctor', null, ['class' => 'col-md-8 col-form-label form_label']) !!}
                {!! Form::select('doctor_id', $doctors, null, ['class' => 'form-control col-md-8', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Date', null, ['class' => 'col-md-8 col-form-label form_label']) !!}
                {!! Form::date('date', now(), ['class' => 'form-control col-md-8', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Title', null, ['class' => 'col-md-8 col-form-label form_label']) !!}
                {!! Form::text('title', null, ['class' => 'form-control col-md-8', 'autocomplete' => 'off', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Description', null, ['class' => 'col-md-8 col-form-label form_label']) !!}
                {!! Form::textarea('description', null, ['rows' => 3, 'class' => 'form-control col-md-8']) !!}
            </div>

            <div class="form-group">
                {!! Form::hidden('patient_id', auth()->id()) !!}
                {!! Form::submit('Submit', ['class' => 'btn btn-md btn-outline-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection