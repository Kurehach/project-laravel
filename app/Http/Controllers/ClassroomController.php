<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::withCount('students')
            ->orderBy('name')
            ->get();

        return view('admin.classroom.index', compact('classrooms'));
    }

    public function create()
    {
        return view('admin.classroom.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:classrooms,name'],
            'major' => ['required', 'string', 'max:100'],
        ], [
            'name.required' => 'Nama kelas wajib diisi.',
            'name.unique' => 'Nama kelas sudah ada.',
            'major.required' => 'Jurusan wajib diisi.',
        ]);

        Classroom::create($validated);

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Data classroom berhasil ditambahkan.');
    }
}