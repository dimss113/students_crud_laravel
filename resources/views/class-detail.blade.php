@extends('layouts.mainLayout')

@section('title', 'Students')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="container mb-5">
        <h1>ini halaman class</h1>

        <table class="table">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Students</th>
                <th>Teacher</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->name }}</td>
                <td>
                    @foreach ($class->students as $student)
                        <ul>
                            <li>{{ $student->name }}</li>
                        </ul>
                    @endforeach
                </td>
                <td>
                    {{ $class->teachers->name }}
                </td>
                <td><a href="/class">back</a></td>
            </tr>
        </table>

    </div>
@endsection
