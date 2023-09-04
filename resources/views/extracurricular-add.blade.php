@extends('layouts.mainLayout')

@section('title', 'add extracurricular')

@section('content')
    <div class="mt-5 col-8 m-auto">
        <form action="/ekskul" method="post">
            @csrf
            <div class="mb-3">
                <label for='name'>Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name" required>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
