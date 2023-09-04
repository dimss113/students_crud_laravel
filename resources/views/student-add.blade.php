@extends('layouts.mainLayout')

@section('title', 'add student')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="mt-5 col-8 m-auto">
        <form action="/student" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for='name'>Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name" required>
            </div>
            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name='gender' id='gender' class="form-control" required>
                    <option value="">Select One</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="mb-3">
                <label for='nrp'>NRP</label>
                <input type="text" name="nrp" class="form-control" id="nrp" placeholder="nrp" required>
            </div>

            <div class="mb-3">
                <label for="class">Class</label>
                <select name='class_id' id='class' class="form-control" required>
                    <option value="">Select One</option>
                    @foreach ($class as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="photo">Photo</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
