@extends('layouts.mainLayout')

@section('title', 'Students')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="container mb-5">
        <h1>ini halaman student</h1>

        <div class="my-3">
            {{-- <img src="{{ asset('storage/images/' . $student->image) }}" width="200px" /> --}}
            @if (($student->image != null || $student->image != '') && file_exists(public_path('storage/images/' . $student->image)))
                <img src="{{ asset('storage/images/' . $student->image) }}" width="200px" />
            @else
                <img src="{{ asset('images/2023-09-04-18-09-09.jpg') }}" width="200px" />
            @endif
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>NRP</th>
                    <th>Class_id</th>
                    <th>Class</th>
                    <th>Teachers</th>
                    <th>Extracurricular</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->nrp }}</td>
                    <td>{{ $student->class_id }}</td>
                    <td>{{ $student->class->name }}</td>
                    <td>{{ $student->class->teachers->name }}</td>
                    <td>
                        @foreach ($student->extracurriculars as $extracurricular)
                            <ul>
                                <li>{{ $extracurricular->name }}</li>
                            </ul>
                        @endforeach
                    </td>
                    <td><a href='/students'>back</a></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
