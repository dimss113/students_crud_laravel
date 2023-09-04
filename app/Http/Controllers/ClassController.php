<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Session;


class ClassController extends Controller
{
    public function index()
    {

        // $class = ClassRoom::all();
        // $class = ClassRoom::with(['students', 'extracurriculars', 'teachers'])->get();

        $class = ClassRoom::get();

        return view('class', [
            'classList' => $class
        ]);
    }

    public function show($id)
    {
        $class = ClassRoom::with(['students', 'extracurriculars', 'teachers'])->findOrFail($id);

        return view('class-detail', [
            'class' => $class
        ]);
    }

    public function create()
    {
        $teacher = Teacher::select('id', 'name')->get();

        return view('class-add', [
            'teacherList' => $teacher
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required'
        ]);

        $class = ClassRoom::create([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id
        ]);


        if ($class) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new class success');
        }

        return redirect('/class');
        // dd($request->all());
    }

    public function edit($id)
    {
        $class = ClassRoom::findOrFail($id);
        $teacher = Teacher::select('id', 'name')->get();

        return view('class-edit', [
            'class' => $class,
            'teacherList' => $teacher
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required'
        ]);

        $class = ClassRoom::findOrFail($request->id);

        $class->update([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id
        ]);

        if ($class) {
            Session::flash('status', 'success');
            Session::flash('message', 'update class success');
        }

        return redirect('/class');
    }

    public function delete($id)
    {
        $class = ClassRoom::with('teachers')->findOrFail($id);

        return view('class-delete', [
            'class' => $class
        ]);
    }

    public function destroy($id)
    {
        $class = ClassRoom::findOrFail($id);

        // ignore student constraint and teacher constraint
        // $class->students()->detach();
        // $class->extracurriculars()->detach();


        $class->delete();

        if ($class) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete class success');
        }

        return redirect('/class');
    }
}