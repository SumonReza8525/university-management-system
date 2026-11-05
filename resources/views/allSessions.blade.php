<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
  
<div class="max-w-4xl mx-auto mt-10 bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

    <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Sessions</h2>
            <p class="text-sm text-gray-500 mt-1">Manage all available Sessions</p>
        </div>
      
<p>Total-{{$totalSessions}}</p>
        <a href="{{ route('session.create') }}"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
            + Add Session
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">

            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 font-semibold">#</th>
                    <th class="px-6 py-4 font-semibold">Session Name</th>
                    <th class="px-6 py-4 font-semibold text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">

                @forelse ($sessions as $session)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 text-gray-500">
                            {{ $session->id}}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $session->session }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-3">

                                {{-- <a href="{{ route('session.edit', $session->id) }}"
                                    class="px-3 py-1.5 rounded-md bg-blue-50 text-blue-600 hover:bg-blue-100 font-medium transition">
                                    Edit
                                </a> --}}

                                <form action="{{ route('session.destroy', $session->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                       
                                        class="px-3 py-1.5 rounded-md bg-red-50 text-red-600 hover:bg-red-100 font-medium transition">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-10 text-center text-gray-500">
                            No Session found.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</div>

</body>
</html>