<x-admin.layout>
    <div class="mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Students
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola data siswa.
                </p>
            </div>

            <div>
                <button
                    type="button"
                    data-modal-target="createStudentModal"
                    data-modal-toggle="createStudentModal"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700"
                >
                    + Tambah Siswa
                </button>
            </div>

            {{-- Modal Create Student --}}
            @include('admin.student.create')
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

    {{-- Alert Error --}}
    @if (session('error'))
        <div id="alert-error"
            class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200"
            role="alert">
            <div class="font-medium">
                {{ session('error') }}
            </div>

            <button type="button"
                onclick="document.getElementById('alert-error').remove()"
                class="ms-auto p-1.5 text-red-500 rounded-lg hover:bg-red-200">
                ✕
            </button>
        </div>
    @endif

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="p-4 border-b border-gray-200 sm:p-6">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                {{-- Search --}}
                <form
                    action="{{ route('admin.student.index') }}"
                    method="GET"
                    class="w-full lg:max-w-md"
                >
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg
                                class="w-5 h-5 text-gray-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"
                                />
                            </svg>
                        </div>

                        <input
                            type="search"
                            name="search"
                            id="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama atau NIS..."
                            class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                </form>

                {{-- Filter Kelas --}}
                <form action="{{ route('admin.student.index') }}" method="GET" class="flex items-center gap-2">
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <select
                        name="classroom_id"
                        aria-label="Filter Kelas"
                        onchange="this.form.submit()"
                        class="px-3 py-2.5 text-sm text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    >
                        <option value="">
                            -- Semua Kelas --
                        </option>
                        @foreach ($classrooms as $classroom)
                            <option
                                value="{{ $classroom->id }}"
                                {{ (string) request('classroom_id') === (string) $classroom->id ? 'selected' : '' }}
                            >
                                {{ $classroom->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">NIS</th>
                        <th class="px-6 py-3">Classroom</th>
                        <th class="px-6 py-3">Address</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $students->firstItem() + $loop->index }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->nis }}</td>
                            <td class="px-6 py-4">{{ $student->classroom?->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $student->address ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Belum ada data siswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4">
            {{ $students->links() }}
        </div>
    </div>
</x-admin.layout>