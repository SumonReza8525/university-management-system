<?php
namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller {
//     public function index() {
//         $departments      = Department::where( 'name', 'Computer Science' )->with( 'teachers' )->get();
//         $totalDepartments = Department::count();

//         return $departments;
//         // return view( 'allDepartments', compact( ['departments', 'totalDepartments'] ) );
//     }

    public function index( Request $request ) {
        $departments = Department::query()
            ->when( $request->search, function ( $query, $search ) {
                $query->where( 'name', 'LIKE', "%{$search}%" );
            } )
            ->orderBy( 'id', 'asc' )
            ->get();
        $totalDepartments = $departments->count();
        return view( 'allDepartments', compact( ['departments', 'totalDepartments'] ) );
    }

    public function create() {
        return view( 'createDepartment' );
    }
    public function store( Request $request ) {
        $request->validate( [
            'name' => 'required|string|max:255|unique:departments,name',
        ] );

        $department = Department::create( [
            'name' => $request->name,
        ] );

        return redirect()->route( 'department.index' )->with( 'success', 'Department created successfully!' );
    }

    public function edit( string $id ) {
        $department = Department::findOrFail( $id );
        return view( 'editDepartment', compact( 'department' ) );
    }

    public function update( Request $request, string $id ) {
        $department = Department::findOrFail( $id );
        $validated  = $request->validate( [
            'name' => 'required|string|max:255|unique:departments,name,' . $id,
        ] );
        $department->update( $validated );
        return redirect()->route( 'department.index' )
            ->with( 'success', 'Department updated successfully!' );

    }

    public function delete( string $id ) {
        $department = Department::findOrFail( $id );
        $department->delete();
        return redirect()->route( 'department.index' )
            ->with( 'success', 'Department deleted successfully!' );
    }
}
