@extends('layouts.mainLayout')

@section('title', 'Students')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="container mb-5">
        <h1>ini halaman class</h1>

        <div class="my-5">
            <a href="/class-add" class="btn btn-primary">Add data</a>
        </div>

        <table class="table">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Action</th>
                {{-- <th>Students</th>
                <th>Teacher</th> --}}
            </tr>
            {{-- @foreach ($classList as $class)
                @foreach ($class->students as $student)
                    <tr>
                        <td>{{ $class->id }}</td>
                        <td>{{ $class->name }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            @foreach ($student->extracurriculars as $extracurricular)
                                <ul>
                                    <li>{{ $extracurricular->name }}</li>
                                </ul>
                            @endforeach
                        </td>
                        <td>{{ $class->teachers->name }}</td>
                    </tr>
                @endforeach
            @endforeach --}}
            @foreach ($classList as $class)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $class->name }}</td>
                    <td>
                        <a href='class-detail/{{ $class->id }}'>detail</a>
                        <a href='class-edit/{{ $class->id }}'>edit</a>
                        <a href='class-delete/{{ $class->id }}'>delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
