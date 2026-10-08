@extends('layouts.app')

@section('title', 'Add Appointment')

@section('content')

<h4>Add Appointment</h4>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
     <div class="mb-3"></div>
    <label for="patient_id" class="form-label">Patient</label>
    <select class="form-control" name="patient_id">
        <option value="">Select Patient</option>
        @foreach($patients as $patient)
        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
        @endforeach
    </select>

    </div>
     <div class="mb-3"></div>
    <label for="doctor_id" class="form-label">Doctor</label>
    <select class="form-control" name="doctor_id">
        <option value="">Select Doctor</option>
        @foreach($doctors as $doctor)
        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
        @endforeach
    </select>

    </div>
     <div class="mb-3"></div>
    <label for="appointment_date" class="form-label">Appointment Date</label>
    <input type="date" class="form-control" name="appointment_date" value="{{ old('appointment_date') }}">

    </div>
     <div class="mb-3"></div>
    <label for="status" class="form-label">Status</label>
    <input type="text" class="form-control" name="status" value="{{ old('status') }}">

    </div>

    <button type="submit" class="btn btn-primary">Save Appointment</button>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
