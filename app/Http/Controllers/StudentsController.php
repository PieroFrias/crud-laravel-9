<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Career;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $careers = Career::all();

        return view('students.index', compact('students', 'careers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Student::create($request->all());

        return redirect()->route('students.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Student $student)
    {
        $careers = Career::all();

        return view('students.edit', compact('student', 'careers'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back();
    }
}
