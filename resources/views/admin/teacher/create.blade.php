<x-admin.layout>
    <div class="p-6 max-w-2xl">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Teacher</h1>
            <a href="{{ route('admin.teacher.index') }}" class="text-sm text-blue-600 hover:underline">Kembali</a>
        </div>

        <form action="{{ route('admin.teacher.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow">
            @csrf

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">NIP</label>
                <input type="text" name="nip" value="{{ old('nip') }}" required class="w-full p-2.5 text-sm border rounded-lg">
                @error('nip') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">Nama Guru</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full p-2.5 text-sm border rounded-lg">
                @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">Kelas</label>
                <select name="classroom_id" required class="w-full p-2.5 text-sm border rounded-lg">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}" @selected(old('classroom_id') == $classroom->id)>
                            {{ $classroom->name }}
                        </option>
                    @endforeach
                </select>
                @error('classroom_id') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">No. HP (Opsional)</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full p-2.5 text-sm border rounded-lg">
                @error('phone') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                Simpan Teacher
            </button>
        </form>
    </div>
</x-admin.layout>