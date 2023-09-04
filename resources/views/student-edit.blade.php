@extends('layouts.mainLayout')

@section('title', 'add student')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="mt-5 col-8 m-auto">
        <form action="/student/{{ $student->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for='name'>Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name" required
                    value="{{ $student->name }}">
            </div>
            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name='gender' id='gender' class="form-control" required>
                    <option value="L" {{ $student->gender == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                    <option value="P" {{ $student->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for='nrp'>NRP</label>
                <input type="text" name="nrp" class="form-control" id="nrp" placeholder="nrp" required
                    value="{{ $student->nrp }}">
            </div>

            <div class="mb-3">
                <label for="class">Class</label>
                <select name='class_id' id='class' class="form-control" required>
                    @foreach ($class as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $student->class_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
