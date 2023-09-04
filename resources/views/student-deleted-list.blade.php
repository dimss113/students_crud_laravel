@extends('layouts.mainLayout')

@section('title', 'Students')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="container mb-5">
        <h1>ini halaman student</h1>

        <div class="my-5 ">
            <a href="students" class="btn btn-info">Undeleted Data</a>
        </div>

        {{-- notif hanya akan muncul misal data berhasil dibuat --}}
        @if (Session::has('status'))
            <div role="alert" class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>NRP</th>
                    <th>Action</th>
                    {{-- <th>Class_id</th>
                    <th>Class</th>
                    <td>Teachers</td>
                    <td>Extracurricular</td> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($studentList as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->nrp }}</td>
                        {{-- <td>{{ $student->class_id }}</td>
                        <td>{{ $student->class->name }}</td>
                        <td>{{ $student->class->teachers->name }}</td>
                        <td>
                            @foreach ($student->extracurriculars as $extracurricular)
                                <ul>
                                    <li>{{ $extracurricular->name }}</li>
                                </ul>
                            @endforeach
                        </td> --}}
                        <td>
                            {{-- <a href='student/{{ $student->id }}'>detail</a>
                            <a href='student-edit/{{ $student->id }}'>edit</a>
                            <a href='student-delete/{{ $student->id }}'>Delete</a> --}}
                            <a href="/student/{{ $student->id }}/restore">restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
