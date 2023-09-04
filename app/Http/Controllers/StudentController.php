<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

// use firstOrfail

class StudentController extends Controller
{
    public function index()
    {
        // var_dump("Hello World");
        // dd("Hello World");

        // $name = 'budi';

        // return view('student', [
        //     'name' => $name,
        //     'role' => 'Staff',
        //     'buah' => ['Mangga', 'Jeruk', 'Apel', 'Anggur']
        // ]);


        // =============== USING ELOQUENT ORM========================//

        // $student = Student::all(); // select * from students;
        // $student = Student::where('id', 1)->get(); // select * from students where id = 1;
        // $student = Student::where('id', 1)->first(); // select * from students where id = 1 limit 1;
        // $student = Student::where('id', 1)->firstOrFail(); // select * from students where id = 1 limit 1; jika tidak ada maka akan error
        // $student = Student::where('id', 1)->firstOr(function () {
        //     return "Tidak ada data";
        // }); // select * from students where id = 1 limit 1; jika tidak ada maka akan menampilkan "Tidak ada data"

        // print the result using dd()
        // dd($student);


        // Relationship with class
        $student = Student::with('class')->get();

        return view('student', [
            'studentList' => $student
        ]);



        // ============== USING QUERY BUILDER =======================//
        // -------- GET ALL DATA -------- //
        // $student = DB::table('students')->get(); // select * from students;
        // -------- GET DATA BY ID -------- //
        // $student = DB::table('students')->where('id', 1)->get(); // select * from students where id = 1;
        // -------- GET DATA BY ID LIMIT 1 -------- //
        // $student = DB::table('students')->where('id', 1)->first(); // select * from students where id = 1 limit 1;
        // -------- INSERT DATA -------- //
        // $student = DB::table('students')->insert([
        //     'name' => 'Andikan Laksana',
        //     'class_id' => 2,
        //     'nrp' => '5025211888',
        //     'gender' => 'L',
        // ]);

        // -------- UPDATE DATA -------- //
        // $student = DB::table('students')->where('id', 1)->update([
        //     'name' => 'Andikan Laksana Putra',
        //     'class_id' => 2,
        // ]);
        // -------- DELETE DATA -------- //
        // $student = DB::table('students')->where('id', 187)->delete();
        // dd($student);

        // ============== USING ELOQUENT ORM =======================//
        // -------- GET ALL DATA -------- //
        // $student = Student::all(); // select * from students;
        // -------- GET DATA BY ID -------- //
        // $student = Student::where('id', 1)->get(); // select * from students where id = 1;
        // -------- GET DATA BY ID LIMIT 1 -------- //
        // $student = Student::where('id', 1)->first(); // select * from students where id = 1 limit 1;
        // -------- INSERT DATA -------- //
        // Student::create([
        //     'name' => 'Frederick Hidayat',
        //     'class_id' => 3,
        //     'nrp' => '5025211881',
        //     'gender' => 'L',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
        // -------- UPDATE DATA -------- //
        // Student::where('id', 187)->update([
        //     'name' => 'Frederick Hidayat CUY',
        //     'class_id' => 3,
        //     'updated_at' => Carbon::now(),
        // ]);
        // -------- UPDATE DATA USING FIND -------- //
        // Student::find(187)->update([
        //     'name' => 'Frederick Hidayat CUY2',
        //     'class_id' => 3,
        //     'updated_at' => Carbon::now(),
        // ]);
        // -------- DELETE DATA -------- //
        // Student::where('id', 186)->delete();
        // -------- DELETE DATA USING FIND -------- //
        // Student::find(185)->delete();


        // ============================TRY USING COLLECTIONS =================================== //
        // ------ CALCULATE MEAN VALUE OR AVG ------ //
        $nilai = [9, 4, 5, 1, 5, 6, 4, 3, 1, 2, 4, 5, 7, 10];

        // Calculate mean value using bacic PHP
        $total = 0;
        foreach ($nilai as $n) {
            $total += $n;
        }
        $mean = $total / count($nilai);
        // or u can try using this
        $mean = array_sum($nilai) / count($nilai);

        // Calculate mean value using collections
        $nilaiCollection = collect($nilai);
        $mean = $nilaiCollection->avg();
        // dd($mean);


        // ------ CALCULATE MEDIAN VALUE ------ //
        // Calculate median value using basic PHP
        sort($nilai);
        $count = count($nilai);
        $median = $count % 2 == 0 ? ($nilai[$count / 2 - 1] + $nilai[$count / 2]) / 2 : $nilai[floor($count / 2)];

        // Calculate median value using collections
        $median = $nilaiCollection->median();
        // dd($median);


        // ------ COLLECTION CONTAINS ------ //
        $buah = ['Mangga', 'Jeruk', 'Apel', 'Anggur'];
        $buahCollection = collect($buah);
        $buahCollection->contains('Jeruk'); // true
        $buahCollection->contains('Semangka'); // false
        // or u can try using this
        $buahCollection->contains(function ($value, $key) {
            return $value == 'Jeruk';
        }); // true
        // or u can try using this
        $buahCollection->contains(function ($value, $key) {
            return $value == 'Semangka';
        }); // false
        // dd($buahCollection->contains('Jeruk')
        //     && $buahCollection->contains('Apel'));


        // ------ COLLECTION COUNT ------ //
        // dd($buahCollection->count()); // 4
        // $buahCollection->count('Jeruk'); // 1
        // dd($buahCollection->count(function ($value, $key) {
        //     return strlen($value) > 4;
        // })); // 2

        // ------ COLLECTION EACH ------ //
        // $key = index in array 
        // $buahCollection->each(function ($value, $key) {
        //     echo $value . " ";
        // }); // Mangga Jeruk Apel Anggur

        // ------ COLLECTION FILTER ------ //
        // dd($buahCollection->filter(function ($value, $key) {
        //     return strlen($value) > 4;
        // })->all()); // ['Mangga', 'Jeruk', 'Anggur']

        // ------ COLLECTION FIRST ------ //
        // $buahCollection->first(); // Mangga
        // dd($buahCollection->first(function ($value, $key) {
        //     return strlen($value) > 10;
        // })); // Mangga

        // ------ COLLECTION LAST ------ //
        // $buahCollection->last(); // Anggur
        // $buahCollection->last(function ($value, $key) {
        //     return strlen($value) > 4;
        // }); // Anggur

        // ------ COLLECTION MAP ------ //

        // $buahCollection->map(function ($value, $key) {
        //     return strtoupper($value);
        // }); // ['MANGGA', 'JERUK', 'APEL', 'ANGGUR']

        // ------ COLLECTION MAX ------ //
        // $nilaiCollection->max(); // 10

        // ------ COLLECTION MIN ------ //
        // $nilaiCollection->min(); // 1

        // ------ COLLECTION SUM ------ //
        // $nilaiCollection->sum(); // 66

        // ------ COLLECTION SORT ------ //
        // $nilaiCollection->sort(); // [1, 1, 2, 3, 4, 4, 4, 5, 5, 5, 6, 7, 9, 10]

        // ------ COLLECTION SORT DESCENDING ------ //
        // $nilaiCollection->sortDesc(); // [10, 9, 7, 6, 5, 5, 5, 4, 4, 4, 3, 2, 1, 1]

        // ------ COLLECTION SORT BY ------ //
        // $nilaiCollection->sortBy(function ($value, $key) {

        //     if ($value % 2 == 0) {
        //         return $value;
        //     }
        // }); // [2, 4, 4, 4, 6, 10]

        // ------ COLLECTION SORT BY DESCENDING ------ //
        // $nilaiCollection->sortByDesc(function ($value, $key) {

        //     if ($value % 2 == 0) {
        //         return $value;
        //     }
        // }); // [10, 6, 4, 4, 4, 2]

        // ------ COLLECTION SORT BY MULTIPLE ------ //
        // $nilaiCollection->sortBy(function ($value, $key) {
        //     return [
        //         $value % 2 == 0,
        //         $value
        //     ];

        // }); // [2, 4, 4, 4, 6, 10]

        // ------ COLLECTION SORT BY MULTIPLE DESCENDING ------ //
        // $nilaiCollection->sortByDesc(function ($value, $key) {
        //     return [
        //         $value % 2 == 0,
        //         $value
        //     ];

        // }); // [10, 6, 4, 4, 4, 2]


        // ------ COLLECTION DIFF ------ //
        // membandingkan nilai kedua array dengan output nilai yang berbeda
        $nilaiCollection->diff([1, 2, 3, 4, 5]); // [9, 6, 7, 10]

        // ------- COLLECTION PLUCK ------- //
        // mengambil nilai dari array yang diinginkan
        // apabila dari database tidak perlu dicollect?
        $student = Student::all();
        $studentPluck = $student->pluck('name'); // ['Dimas Fadilah', 'Ayu Putri', 'Rizky Ananda', 'Rizky Khairani', 'Andikan Laksana', 'Frederick Hidayat', 'Frederick Hidayat CUY', 'Frederick Hidayat CUY2']
        // dd($studentPluck);

    }

    public function index2(Request $request)
    {
        // $studentList = Student::with(['class.teachers', 'extracurriculars'])->get();

        // apabila data dari class dan extra tidak dibutuhkan maka gunakan ini saja 
        // $studentList = Student::withoutTrashed()->get();

        // menggunakan dua query yaitu menghitung total jumlah data dan mendapatkan 15 data
        $keyword = $request->keyword;
        $studentList = Student::with(['class'])->withoutTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orWhere('gender', $keyword)->orWhere('nrp', 'LIKE', '%' . $keyword . '%')->orWhereHas('class', function ($query) use ($keyword) {
            $query->where('name', $keyword);
        })->paginate(15);


        // hanya mendapatkan 15 data tanpa menghitung total data
        // $studentlist = Student::simplePaginate(15);

        return view('student', [
            'studentList' => $studentList
        ]);
    }

    public function show($id)
    {
        // get data student by index
        $student = Student::with(['class.teachers', 'extracurriculars'])->findOrFail($id);

        return view('student-detail', [
            'student' => $student
        ]);
    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();

        return view('student-add', ['class' => $class]);

    }

    public function store(Request $request)
    {
        $filename = "";
        if ($request->file('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = date('Y-m-d-H-i-s') . "." . $extension;
            $request->file('photo')->storeAs('images', $filename);
        }


        // $student = new Student;
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nrp = $request->nrp;
        // $student->class_id = $request->class_id;
        // $student->save();

        // use mass assignment
        $request['image'] = $filename;
        $student = Student::create($request->all());

        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new student success');
        }

        return redirect('/students');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $class = ClassRoom::select('id', 'name')->get();
        // or you can use this method
        // $class = ClassRoom::where('id', '!=', $student->class_id)->select('id', 'name')->get();
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {

        $student = Student::findOrFail($id);
        $student->update($request->all());

        // dd($request->all());
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findorFail($id);

        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        // using query builder
        // $deleteStudent = DB::table('students')->where('id', $id)->delete();

        // using eloquent
        $deletedStudent = Student::findorFail($id);
        $deletedStudent->delete();
        return redirect('/students');
    }

    public function deletedStudent()
    {
        $student = Student::onlyTrashed()->get();

        return view('student-deleted-list', ['studentList' => $student]);
    }

    public function restore($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);
        $student->restore();

        return redirect('/students');
    }
    // query pada laravel ada 3:
    // eloquent orm (rekomendasi)
    // query builder (masih okelah)
    // raw query (tidak rekomendasi)
}