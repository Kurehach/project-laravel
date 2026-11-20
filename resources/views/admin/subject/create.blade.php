<x-admin.layout>
    <div class="p-6 max-w-2xl">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Subject</h1>
            <a href="{{ route('admin.subject.index') }}" class="text-sm text-blue-600 hover:underline">Kembali</a>
        </div>

        <form action="{{ route('admin.subject.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow">
            @csrf

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">Kode Mapel</label>
                <input type="text" name="code" value="{{ old('code') }}" required class="w-full p-2.5 text-sm border rounded-lg">
                @error('code') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">Nama Mata Pelajaran</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full p-2.5 text-sm border rounded-lg">
                @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">Guru Pengampu</label>
                <select name="teacher_id" required class="w-full p-2.5 text-sm border rounded-lg">
                    <option value="">-- Pilih Teacher --</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" @selected(old('teacher_id') == $teacher->id)>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
                @error('teacher_id') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                Simpan Subject
            </button>
        </form>
    </div>
</x-admin.layout>