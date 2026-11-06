<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Session;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $students = Student::with( 'stuPersonalInfo' )->get();
        return $students;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // $years = Year::with( 'students' )->get();
        $years       = Year::all();
        $sessions    = Session::all();
        $departments = Department::all();
        // return $departments;
        // return $sessions;

        return view( 'createStudent', compact( ['years', 'sessions', 'departments'] ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validated = $request->validate( [
            // Student information
            'name'              => ['required', 'string', 'max:255'],
            'studentId'         => ['required', 'unique:students,studentId'],
            'department_id'     => ['required', 'exists:departments,id'],
            'session_id'        => ['required', 'exists:sessions,id'],
            'year_id'           => ['required', 'exists:years,id'],

            // Personal information
            'phone'             => ['required', 'string', 'max:20'],
            'date_of_birth'     => ['required', 'date', 'before:today'],
            'gender'            => ['required', 'in:Male,Female,Other'],
            'father_name'       => ['required', 'string', 'max:255'],
            'mother_name'       => ['required', 'string', 'max:255'],
            'present_address'   => ['required', 'string'],
            'permanent_address' => ['required', 'string'],
        ] );

        DB::transaction( function () use ( $validated ) {

            $student = Student::create( [
                'name'          => $validated['name'],
                'studentId'     => $validated['studentId'],
                'department_id' => $validated['department_id'],
                'session_id'    => $validated['session_id'],
                'year_id'       => $validated['year_id'],
            ] );

            $student->stuPersonalInfo()->create( [
                'phone'             => $validated['phone'],
                'date_of_birth'     => $validated['date_of_birth'],
                'gender'            => $validated['gender'],
                'father_name'       => $validated['father_name'],
                'mother_name'       => $validated['mother_name'],
                'present_address'   => $validated['present_address'],
                'permanent_address' => $validated['permanent_address'],
            ] );
        } );

        return redirect()->route( 'student.index' )
            ->with( 'success', 'Student registered successfully!' );
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {
        //
    }
}
