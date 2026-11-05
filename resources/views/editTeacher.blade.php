
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50 min-h-screen py-10 px-4">

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm border border-gray-200 p-6 sm:p-8">

        <div class="mb-7">
            <h2 class="text-2xl font-bold text-gray-800">Update Teacher</h2>
            <p class="text-sm text-gray-500 mt-1">Update the teacher's information below.</p>
        </div>

        <form action="{{ route('teacher.update',$teacher->id) }}" method="POST">
            @csrf
           @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                {{-- Teacher Name --}}
                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Teacher Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name',$teacher->name) }}"
                        placeholder="Enter teacher name"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >

                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Position --}}
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700 mb-2">
                        Position
                    </label>

                    <select
                        name="position"
                        id="position"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        <option value="">Select Position</option>
                        @foreach (['Professor', 'Associate Professor', 'Assistant Professor', 'Lecturer'] as $position)
                            <option value="{{ $position }}" {{ old('position',$teacher->position) == $position ? 'selected' : '' }}>
                                {{ $position }}
                            </option>
                        @endforeach
                    </select>

                    @error('position')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Joining Date --}}
                <div>
                    <label for="joining_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Joining Date
                    </label>

                    <input
                        type="date"
                        name="joining_date"
                        id="joining_date"
                        value="{{ old('joining_date',$teacher->joining_date) }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('joining_date')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Qualification --}}
                <div>
                    <label for="qualification" class="block text-sm font-medium text-gray-700 mb-2">
                        Qualification
                    </label>

                    <input
                        type="text"
                        name="qualification"
                        id="qualification"
                        value="{{ old('qualification',$teacher->qualification) }}"
                        placeholder="e.g. MSc, PhD"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('qualification')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Department --}}
                <div>
                    <label for="department_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Department
                    </label>

                    <select
                        name="department_id"
                        id="department_id"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        <option value="">Select Department</option>

                        @foreach ($departments as $department)
                            <option
                                value="{{ $department->id }}"
                                {{ old('department_id',$teacher->department_id) == $department->id ? 'selected' : '' }}
                            >
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('department_id')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-3 mt-8 pt-5 border-t border-gray-100">

                <a href="{{ route('teacher.index') }}"
                   class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-6 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition">
                    Update Teacher
                </button>

            </div>

        </form>
    </div>

</body>
</html>
