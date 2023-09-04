@extends('layouts.mainLayout')

@section('title', 'Extracurricular')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="container mb-5">
        <h1>ini halaman Extracurricular</h1>

        <div class="my-5">
            <a href="/ekskul-add" class="btn btn-primary">Add data</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Action</th>
                    {{-- <th>Students</th> --}}
            </thead>
            <tbody>
                @foreach ($ekskulList as $ekskul)
                    <tr>
                        <td>{{ $ekskul->id }}</td>
                        <td>{{ $ekskul->name }}</td>
                        {{-- <td>
                            @foreach ($ekskul->students as $student)
                                <ul>
                                    <li>{{ $student->name }}</li>
                                </ul>
                            @endforeach
                        </td> --}}
                        <td><a href='ekskul-detail/{{ $ekskul->id }}'>detail</a>
                            <a href="/ekskul-edit/{{ $ekskul->id }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
