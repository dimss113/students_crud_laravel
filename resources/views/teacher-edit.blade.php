@extends('layouts.mainLayout')
@section('title', 'Edit Teacher')

@section('content')
    <div class="mt-5 col-8 m-auto">
        <form action="/teacher/{{ $teacher->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for='name'>Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name"
                    value="{{ $teacher->name }}" required>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>

@endsection
