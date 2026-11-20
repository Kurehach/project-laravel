<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('classroom')->latest()->get();

        return view('admin.teacher.index', compact('teachers'));
    }

    public function create()
    {
        $classrooms = Classroom::orderBy('name')->get();

        return view('admin.teacher.create', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:50', 'unique:teachers,nip'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'phone' => ['nullable', 'string', 'max:30'],
        ]);

        Teacher::create($validated);

        return redirect()
            ->route('admin.teacher.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }
}