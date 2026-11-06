<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Create</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    

    <form action="{{ route('student.store') }}" method="POST" class=" p-6">
        @csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-8 py-6 rounded-xl shadow-xl border-4 border-gray-400">

    <p class="text-2xl font-bold mb-4">Student Academic Information</p>
    <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
            Student Name <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name') }}"
            placeholder="Write student name"
            class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 placeholder:text-gray-400 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
        >

        @error('name')
            <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
    </div>


    {{-- Student ID --}}
    <div>
        <label for="studentId" class="block text-sm font-semibold text-gray-700 mb-2">
            Student ID <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="studentId"
            id="studentId"
            value="{{ old('studentId') }}"
            placeholder="e.g. STD-2026-001"
            class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 placeholder:text-gray-400 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
        >

        @error('studentId')
            <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
    </div>


    {{-- Academic Year --}}
    <div>
        <label for="year_id" class="block text-sm font-semibold text-gray-700 mb-2">
            Academic Year Id<span class="text-red-500">*</span>
        </label>

        <select
            name="year_id"
            id="year_id"
            class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 cursor-pointer"
        >
            <option value="" disabled @selected(!old('year_id'))>
                Select academic year
            </option>

            @foreach ($years as $year)
                <option value="{{ $year->id }}"
                    @selected(old('year_id') == $year->id)>
                    {{ $year->year }}
                </option>
            @endforeach
        </select>

        @error('year_id')
            <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
    </div>


     <div>
        <label for="department_id" class="block text-sm font-semibold text-gray-700 mb-2">
            Department Id<span class="text-red-500">*</span>
        </label>

        <select
            name="department_id"
            id="department_id"
            class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 cursor-pointer"
        >
            <option value="" disabled @selected(!old('department_id'))>
                Select department
            </option>

            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    @selected(old('department_id') == $department->id)>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>

        @error('department_id')
            <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
    </div>

    {{-- Session --}}
    <div>
        <label for="session_id" class="block text-sm font-semibold text-gray-700 mb-2">
            Academic Session Id<span class="text-red-500">*</span>
        </label>

        <select
            name="session_id"
            id="session_id"
            class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 cursor-pointer"
        >
            <option value="" disabled @selected(!old('session_id'))>
                Select academic session
            </option>

            @foreach ($sessions as $session)
                <option value="{{ $session->id }}"
                    @selected(old('session_id') == $session->id)>
                    {{ $session->session }}
                </option>
            @endforeach
        </select>

        @error('session_id')
            <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
    </div>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-4 border-gray-400 mt-20 px-8 py-6 rounded-xl shadow-2xl">
    <p class="text-2xl font-bold mb-4">Student Personal Information</p>
     <div>
        <label for="phone">Phone number</label>
        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" 
        class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 placeholder:text-gray-400 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10" placeholder="Phone number">
        @error('phone')
             <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
     </div>
     <div>
        <label for="permanent_address">Permanent Address</label>
        <input type="text" name="permanent_address" id="permanent_address" value="{{ old('permanent_address') }}" class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 placeholder:text-gray-400 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10" placeholder="Permanent Address">
        @error('permanent_address')
             <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
     </div>
     <div>
        <label for="present_address">Present Address</label>
        <input type="text" name="present_address" id="present_address" value="{{ old('present_address') }}" class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 placeholder:text-gray-400 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10" placeholder="Present Address">
        @error('present_address')
             <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
     </div>
     <div>
        <label for="father_name">Father Name</label>
        <input type="text" name="father_name" id="father_name" value="{{ old('father_name') }}" class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 placeholder:text-gray-400 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10" placeholder="Father name">
        @error('father_name')
             <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
     </div>
     <div>
        <label for="mother_name">Mother Name</label>
        <input type="text" name="mother_name" id="mother_name" value="{{ old('mother_name') }}" class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 placeholder:text-gray-400 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10" placeholder="Mother name">
        @error('mother_name')
             <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
     </div>
     
     <div>
        <label for="gender">Gender</label>
        <select name="gender" id="gender"  class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 cursor-pointer">
            <option value="" disabled @selected(!old('gender'))>Select gender</option>
            <option value="Male" @selected(old('gender')=='Male')>Male</option>
            <option value="Female" @selected(old('gender')=='Female')>Female</option>
            <option value="Other" @selected(old('gender')=='Other')>Other</option>
        </select>
        @error('gender')
             <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
     </div>
     <div>
        <label for="date_of_birth">Date of birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm outline-none transition duration-200 hover:border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 cursor-pointer">
          @error('date_of_birth')
             <p class="text-xs font-medium text-red-500 mt-2">{{ $message }}</p>
        @enderror
     </div>
</div>

   <div class="mt-8">
    <button type="submit"
        class="px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
        Create Student
    </button>
</div>

    </form>
</body>
</html>