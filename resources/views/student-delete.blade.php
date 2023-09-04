@extends('layouts.mainLayout')

@section('title', 'Students')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="mt-5">
        <h2>Are you sure delete this data : {{ $student->name }} ({{ $student->nrp }}) </h2>
        <form action="/student-destroy/{{ $student->id }}" style="display: inline-block" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <button class="btn btn-primary">Cancel</button>
    </div>
@endsection
