<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        // $ekskul = Extracurricular::with('students')->get();
        // dd($ekskul);

        $ekskul = Extracurricular::get();

        return view('extracurricular', [
            'ekskulList' => $ekskul
        ]);
    }


    public function show($id)
    {
        $ekskul = Extracurricular::with('students')->findOrFail($id);

        return view('extracurricular-detail', [
            'ekskul' => $ekskul
        ]);
    }

    public function create()
    {

        return view('extracurricular-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $ekskul = Extracurricular::create([
            'name' => $request->name
        ]);

        return redirect('/ekskul');
    }

    public function edit($id)
    {
        $ekskul = Extracurricular::findOrFail($id);

        return view('extracurricular-edit', [
            'ekskul' => $ekskul
        ]);
    }

    public function update($id)
    {
        $ekskul = Extracurricular::findOrFail($id);

        $ekskul->update([
            'name' => request('name')
        ]);

        return redirect('/ekskul');
    }
}