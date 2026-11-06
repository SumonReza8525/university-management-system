<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
   
    
        <div class="px-6 py-4 rounded-xl shadow shadow-gray-500 border-2 border-amber-500 ml-10 mt-20 w-130">
            <h1 class="font-bold text-2xl">{{$student->name}}</h1>
            <div class="flex justify-between">
                <h1>{{$student->stuPersonalInfo->phone}}</h1>
            <h1>{{$student->department->name}}</h1>
            </div>
            <div class="flex justify-between">
                
               <h1>{{$student->stuPersonalInfo->date_of_birth}}</h1>
                <h1>{{$student->stuPersonalInfo->gender}}</h1>

            </div>

        <div class="flex justify-between items-end">
            <div>
              <h1>Permanent Address: {{$student->stuPersonalInfo->permanent_address}}</h1>
                <h1>Present Address: {{$student->stuPersonalInfo->present_address}}</h1>
        </div>
        <div>

            <a class="bg-cyan-400 px-4 py-2 font-semibold  rounded-lg" href="{{ url()->previous() }}">Back</a>
        </div>
        </div>
            
            {{-- <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                    @csrf
             @method('DELETE')
              <button type="submit" class="bg-red-600 font-semibold text-sm px-3 py-1 rounded-lg" >
                  Delete
              </button>

            </form> --}}
        </div>
    

</body>
</html>