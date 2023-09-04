@extends('layouts.mainLayout')

@section('title', 'Students')


<!--  dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
    <div class="container mb-5">
        <h1>ini halaman student</h1>


        <div class="my-5 d-flex justify-content-between">
            <a href="student-add" class="btn btn-primary">Add data</a>
            <a href="student-deleted" class="btn btn-info">Deleted Data</a>
        </div>


        {{-- notif hanya akan muncul misal data berhasil dibuat --}}
        @if (Session::has('status'))
            <div role="alert" class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="my-3 col-12 col-sm-8 col-md-6">
            <form action="" method="get">
                @csrf
                <div class="input-group flex-nowrap ">
                    <input type="text" class="form-control" name="keyword" placeholder="keyword">
                    <button class="input-group-text btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>NRP</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentList as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->nrp }}</td>
                        <td>{{ $student->class->name }}</td>
                        <td>
                            <a href='student/{{ $student->id }}'>detail</a>
                            <a href='student-edit/{{ $student->id }}'>edit</a>
                            <a href='student-delete/{{ $student->id }}'>Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="my-5">

        {{ $studentList->withQueryString()->links() }}
    </div>
@endsection
