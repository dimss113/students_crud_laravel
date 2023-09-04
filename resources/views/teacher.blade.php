@extends('layouts.mainLayout')

@section('title', 'Students')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="container mb-5">
        <h1>ini halaman student</h1>
        <div class="my-5">
            <a href="/teacher-add" class="btn btn-primary">Add data</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacherList as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td><a href="teacher-detail/{{ $teacher->id }}">detail</a>
                            <a href="/teacher-edit/{{ $teacher->id }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
