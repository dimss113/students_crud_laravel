@extends('layouts.mainLayout')

@section('title', 'Extracurricular')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="container mb-5">
        <h1>ini halaman Extracurricular</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Students</th>
                    <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $ekskul->id }}</td>
                    <td>{{ $ekskul->name }}</td>
                    <td>
                        @foreach ($ekskul->students as $student)
                            <ul>
                                <li>{{ $student->name }}</li>
                            </ul>
                        @endforeach
                    </td>
                    <td><a href='/ekskul'>back</a></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
