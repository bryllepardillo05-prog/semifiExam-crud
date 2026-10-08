@extends('layouts.app')

@section('content')
    <div>
        <h1>This is the Dashboard Page!</h1>

        <h2>Total Patients: {{ $patientCount }}</h2>
        <h2>Total Doctors: {{ $doctorCount }}</h2>
        <h2>Total Appointments: {{ $appointmentCount }}</h2>
    </div>
@endsection