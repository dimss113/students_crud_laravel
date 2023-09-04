@extends('layouts.mainLayout')

@section('title', 'edit class')


@section('content')
    <div class="mt-5 col-8 m-auto">
        <form action="/class/{{ $class->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for='name'>Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name"
                    value="{{ $class->name }}" required>
            </div>
            <div class="mb-3">
                <label for="teacher">Teacher</label>
                <select name='teacher_id' id='teacher' class="form-control" required>
                    <option value="">Select One</option>
                    @foreach ($teacherList as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $class->teacher_id) selected @endif>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
