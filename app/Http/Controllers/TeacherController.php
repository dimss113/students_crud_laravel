<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher', [
            'teacherList' => $teacher
        ]);
    }

    public function show($id)
    {
        $teacher = Teacher::with(['class.students'])->findOrFail($id);
        return view('teacher-detail', [
            'teacher' => $teacher
        ]);
    }

    public function create()
    {
        return view('teacher-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $teacher = Teacher::create([
            'name' => $request->name,
        ]);


        return redirect('/teacher');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);


        return view('teacher-edit', [
            'teacher' => $teacher
        ]);
    }

    public function update($id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->update([
            'name' => request()->name
        ]);

        return redirect('/teacher');
    }
}