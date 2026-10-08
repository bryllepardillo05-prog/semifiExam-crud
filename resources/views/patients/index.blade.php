@extends('layouts.app')

@section('content')
    <h3>List of Patients</h3>

    <a href="{{ route('patients.create') }}"
    class="btn btn-primary">
    Add Patient
</a>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<table>
 <thead>
    <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Year Level</th>
        <th>Actions</th>
    </tr>
 </thead>

 <tbody>
    @foreach($patients as $patient)
    <tr>
        <td>{{ $patient->student_id }}</td>
        <td>{{ $patient->name }}</td>
        <td>{{ $patient->course }}</td>
        <td>{{ $patient->year_level }}</td>
        <td>
            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>

            <form
            action="{{ route('patients.destroy', $patient->id) }}"
            method="POST"
            class="d-inline">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"
            onClick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
            </form>
        </td>

    </tr>
    @endforeach

</table>

@endsection
