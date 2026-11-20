<x-admin.layout>
    <div class="max-w-2xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Tambah Classroom
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Tambahkan data kelas baru.
                </p>
            </div>

            <a
                href="{{ route('admin.classroom.index') }}"
                class="text-sm font-medium text-blue-600 hover:underline"
            >
                ← Kembali
            </a>
        </div>

        <form
            action="{{ route('admin.classroom.store') }}"
            method="POST"
            class="p-6 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm"
        >
            @csrf

            <div>
                <label for="name" class="block mb-1 text-sm font-medium text-gray-900">
                    Nama Kelas
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: 11 PPLG 1"
                    required
                    class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                >
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="major" class="block mb-1 text-sm font-medium text-gray-900">
                    Jurusan
                </label>
                <input
                    type="text"
                    name="major"
                    id="major"
                    value="{{ old('major') }}"
                    placeholder="Contoh: PPLG"
                    required
                    class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                >
                @error('major')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700"
                >
                    Simpan Classroom
                </button>
            </div>
        </form>
    </div>
</x-admin.layout>