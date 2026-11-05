<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new department</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    
<form action="{{ route('department.store') }}" method="POST"
    class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-sm border border-gray-200">

    @csrf

    <h2 class="text-xl font-semibold text-gray-800 mb-6">
        Create New Department
    </h2>

    <div class="mb-5">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
            Department Name
        </label>

        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name') }}"
            placeholder="Enter department name"
            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >

        @error('name')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition">
        Create Department
    </button>

</form>

</body>
</html>