@extends('layouts.mainLayout')

@section('title', 'Students')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="container mb-5">
        <h1>ini halaman student</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Student</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>
                        @if ($teacher->class)
                            @foreach ($teacher->class->students as $student)
                                <ul>
                                    <li>{{ $student->name }}</li>
                                </ul>
                            @endforeach
                        @else
                            <p>tidak ada student</p>
                        @endif
                    </td>
                    <td><a href="/teacher">back</a></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
