@extends('layouts.mainLayout')
@section('title', 'Classes')

@section('content')
    <div class="mt-5">
        <h2>Are you sure delete this data : {{ $class->name }} ({{ $class->teachers->name }}) </h2>
        <form action="/class-destroy/{{ $class->id }}" style="display: inline-block" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <button class="btn btn-primary">Cancel</button>
    </div>
@endsection
