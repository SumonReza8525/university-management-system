<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Session</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    
<form action="{{ route('session.store') }}" method="POST"
    class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-sm border border-gray-200">

    @csrf

    <h2 class="text-xl font-semibold text-gray-800 mb-6">
        Create New Session
    </h2>

    <div class="mb-5">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
            Session
        </label>

        <input
            type="text"
            name="session"
            id="session"
            value="{{ old('session') }}"
            placeholder="Write as 20xx-20yy"
            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >

        @error('session')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition">
        Create Session
    </button>

</form>

</body>
</html>