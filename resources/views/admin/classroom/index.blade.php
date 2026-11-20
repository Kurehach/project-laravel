<x-admin.layout>
    <div class="mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Classrooms
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Kelola data kelas dan jurusan.
                </p>
            </div>

            <div>
                <a
                    href="{{ route('admin.classroom.create') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700"
                >
                    + Tambah Classroom
                </a>
            </div>
        </div>
    </div>

    {{-- Alert Success --}}
    @if (session('success'))
        <div id="alert-success"
            class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200"
            role="alert">
            <div class="font-medium">
                {{ session('success') }}
            </div>

            <button type="button"
                onclick="document.getElementById('alert-success').remove()"
                class="ms-auto p-1.5 text-green-500 rounded-lg hover:bg-green-200">
                ✕
            </button>
        </div>
    @endif

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Kelas</th>
                        <th class="px-6 py-3">Jurusan</th>
                        <th class="px-6 py-3">Jumlah Siswa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classrooms as $classroom)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $classroom->name }}</td>
                            <td class="px-6 py-4">{{ $classroom->major }}</td>
                            <td class="px-6 py-4">{{ $classroom->students_count }} siswa</td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Belum ada data classroom.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>