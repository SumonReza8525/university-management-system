<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller {
    public function index() {
        $teachers = Teacher::all();

        // return $teachers;

        return view( 'allTeacher', compact( 'teachers' ) );
    }

    public function create() {
        $departments = Department::orderBy( 'name' )->get();
        return view( 'createTeacher', compact( 'departments' ) );
    }
    public function store( Request $request ) {

        $validated = $request->validate( [
            'name'          => ['required', 'string', 'max:255'],
            'position'      => ['required', 'string'],
            'joining_date'  => ['required', 'date', 'before_or_equal:today'],
            'qualification' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'exists:departments,id'],
        ] );

        Teacher::create( $validated );

        return redirect()->route( 'teacher.index' )->with( 'success', 'New teacher added successfully!' );
    }

    public function edit( string $id ) {
        $teacher     = Teacher::findOrFail( $id );
        $departments = Department::orderBy( 'name' )->get();
        return view( 'editTeacher', compact( 'teacher', 'departments' ) );
    }

    public function update( Request $request, string $id ) {

        $validated = $request->validate( [
            'name'          => ['required', 'string', 'max:255'],
            'position'      => ['required', 'string'],
            'joining_date'  => ['required', 'date', 'before_or_equal:today'],
            'qualification' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'exists:departments,id'],
        ] );
        $teacher = Teacher::findOrFail( $id );

        $teacher->update( $validated );

        return redirect()->route( 'teacher.index' )->with( 'success', 'teacher updated successfully!' );
    }

    public function delete( string $id ) {
        $teacher = Teacher::findOrFail( $id );
        $teacher->delete();
        return redirect()->route( 'teacher.index' )->with( 'success', 'Teacher deleted successfully!' );
    }

}
