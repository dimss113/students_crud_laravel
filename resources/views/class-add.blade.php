@extends('layouts.mainLayout')

@section('title', 'add class')

@section('content')
    <div class="mt-5 col-8 m-auto">
        <form action="/class" method="post">
            @csrf
            <div class="mb-3">
                <label for='name'>Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name" required>
            </div>
            <div class="mb-3">
                <label for="teacher">Teacher</label>
                <select name='teacher_id' id='teacher' class="form-control" required>
                    <option value="">Select One</option>
                    @foreach ($teacherList as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
