<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title><script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

    <div class="m-10 text-white"><a class="bg-blue-700 px-10 py-4 rounded-lg " href="{{ route('student.create') }}">Add new student+</a></div>
    
<div class="grid grid-cols-2 lg:grid-cols-6 mt-20 px-10 gap-2 lg:gap-4">
    @foreach ($students as $student)
        <div class="px-6 py-4 rounded-xl shadow shadow-gray-500 ">
            <h1 class="font-bold text-2xl">{{$student->name}}</h1>
            <div class="flex justify-between">
                <h1>{{$student->studentId}}</h1>
            <h1>{{$student->department->name}}</h1>
            </div>
            <div class="flex justify-between my-3">
               <div><a class="bg-green-600 font-semibold text-sm px-3 py-1 rounded-lg"  href="{{ route('student.show',$student->id) }}">View Details</a></div>
               <div><a class="bg-fuchsia-600 font-semibold text-sm px-3 py-1 rounded-lg" href="{{ route('student.edit',$student->id) }}">Update</a></div>
            </div>
            <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                    @csrf
             @method('DELETE')
              <button type="submit" class="bg-red-600 font-semibold text-sm px-3 py-1 rounded-lg" >
                  Delete
              </button>

            </form>
        </div>
    @endforeach
</div>

</body>
</html>