
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher Personal Information</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm border border-gray-200 p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-2">
            Teacher Personal Information
        </h2>

        <p class="text-gray-500 text-sm mb-8">
            Provide the personal information of the selected teacher.
        </p>

        <form action="{{ route('teacherInfo.update',$teacherInfo->teacher->id) }}"
              method="PUT"
              enctype="multipart/form-data">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Teacher --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Select Teacher <span class="text-red-500">*</span>
                    </label>

                    <select name="teacher_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Choose Teacher</option>

                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}"
                                {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('teacher_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>

                    <input type="email" name="email"
                        value="{{ old('email') }}"
                        placeholder="example@gmail.com"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-blue-500">

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Phone Number <span class="text-red-500">*</span>
                    </label>

                    <input type="tel" name="phone"
                        value="{{ old('phone') }}"
                        placeholder="01XXXXXXXXX"
                        maxlength="11"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-blue-500">

                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Gender --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Gender
                    </label>

                    <select name="gender"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="">Select Gender</option>

                        @foreach (['Male', 'Female', 'Other'] as $gender)
                            <option value="{{ $gender }}"
                                {{ old('gender') == $gender ? 'selected' : '' }}>
                                {{ $gender }}
                            </option>
                        @endforeach
                    </select>

                    @error('gender')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Marital Status --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Marital Status
                    </label>

                    <select name="marital_status"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="">Select Marital Status</option>

                        @foreach (['Single', 'Married', 'Divorced', 'Widowed'] as $status)
                            <option value="{{ $status }}"
                                {{ old('marital_status') == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>

                    @error('marital_status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Image --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Profile Image
                    </label>

                    <input type="file" name="image" accept="image/*"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm">

                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Permanent Address --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Permanent Address <span class="text-red-500">*</span>
                    </label>

                    <textarea name="permanent_address" rows="3"
                        placeholder="Enter permanent address"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500">{{ old('permanent_address') }}</textarea>

                    @error('permanent_address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Present Address --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Present Address <span class="text-red-500">*</span>
                    </label>

                    <textarea name="present_address" rows="3"
                        placeholder="Enter present address"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500">{{ old('present_address') }}</textarea>

                    @error('present_address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-3 mt-8">

                <a href="{{ route('teacherInfo.index') }}"
                    class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                    Cancel
                </a>

                <button type="submit"
                    class="px-6 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition">
                    Save Information
                </button>

            </div>

        </form>

    </div>

</body>
</html>
