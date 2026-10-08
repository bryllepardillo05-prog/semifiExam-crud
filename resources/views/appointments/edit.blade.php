@extends('layouts.app')
@section('title', 'Edit Appointment')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Appointment</h4>
    </div>

    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <form action="{{ route('appointments.update', $appointment->id) }}"
        method="POST">
        @csrf
        @method('PUT')

        <div class="mb3">
            <label class="form-label">Patient</label>
            <select class="form-control" name="patient_id">
                @foreach($patients as $patient)
                <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb3">
            <label class="form-label">Doctor</label>
            <select class="form-control" name="doctor_id">
                @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb3">
            <label class="form-label">Appointment Date</label>
            <input type="date" name="appointment_date" value="{{ old('appointment_date', $appointment->appointment_date) }}" class="form-control">
        </div>
        <div class="mb3">
            <label class="form-label">Status</label>
            <input type="text" name="status" value="{{ old('status', $appointment->status) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Appointment</button>
        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel
    </form>
</div>
@endsection
