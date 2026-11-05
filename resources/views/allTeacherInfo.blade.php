<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Teachers Personal Info</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    

  <div class="grid grid-cols-3 lg:grid-cols-6 gap-2 lg:gap-4">
    @foreach ($teachersInfos as $teacher)
        <div class="border-2 border-amber-300 rounded-md p-3.5">
            <p class="text-2xl font-bold">{{$teacher->teachers->name}}</p>
            <p class="">{{$teacher->email}}</p>
            <p class="text-sm mb-2">{{$teacher->phone}}</p>
              <div class="flex justify-between">
                <a href="{{ route('teacher.edit', $teacher->gender) }}"
                                    class="px-3 py-1.5 rounded-md bg-blue-50 text-blue-600 hover:bg-blue-100 font-medium transition text-sm">
                                    Edit
                                </a> 
                                <form action="{{ route('teacherInfo.delete', $teacher->teacher_id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                       
                                        class="px-3 py-1.5 rounded-md bg-red-50 text-red-600 hover:bg-red-100 font-medium transition text-sm">
                                        Delete
                                    </button>
                                </form>
              </div>
        </div>
    @endforeach
  </div>

</body>
</html>