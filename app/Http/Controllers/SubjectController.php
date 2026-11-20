<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('teacher')->latest()->get();

        return view('admin.subject.index', compact('subjects'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('name')->get();

        return view('admin.subject.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:30', 'unique:subjects,code'],
            'teacher_id' => ['required', 'exists:teachers,id'],
        ]);

        Subject::create($validated);

        return redirect()
            ->route('admin.subject.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }
}