<?php
namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\TeacherPersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherPersonalInfoController extends Controller {
    public function index() {
        $teachersInfos = TeacherPersonalInfo::with( 'teachers' )->get();

        // return $teachersInfos;

        return view( 'allTeacherInfo', compact( 'teachersInfos' ) );
    }
    public function create() {

        $teachers = Teacher::orderBy( 'name' )->get();
        return view( 'createTeacherInfo', compact( 'teachers' ) );
    }
    public function store( Request $request ) {

        $validated = $request->validate( [
            'teacher_id'        => ['required', 'exists:teachers,id', 'unique:teacher_personal_infos,teacher_id'],
            'email'             => ['required', 'email', 'max:255', 'unique:teacher_personal_infos,email'],
            'phone'             => ['required', 'regex:/^01[3-9]\d{8}$/', 'unique:teacher_personal_infos,phone'],
            'permanent_address' => ['required', 'string', 'max:255'],
            'present_address'   => ['required', 'string', 'max:255'],
            'gender'            => ['nullable', 'in:Male,Female,Other'],
            'marital_status'    => ['nullable', 'in:Single,Married,Divorced,Widowed'],
            'image'             => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ] );

        TeacherPersonalInfo::create( $validated );
        return redirect()->route( 'teacherInfo.index' );

    }
    public function edit( string $id ) {
        $teachersInfo = TeacherPersonalInfo::findOrFail( $id );
        return view( 'editTeacherInfo', compact( 'teachersInfo' ) );
    }

    public function update( Request $request, string $id ) {
        $teachersInfo = TeacherPersonalInfo::findOrFail( $id );

        $validated = $request->validate( [
            'teacher_id'        => [
                'required',
                'exists:teachers,id',
                Rule::unique( 'teacher_personal_infos', 'teacher_id' )
                    ->ignore( $teachersInfo->id ),
            ],

            'email'             => [
                'required',
                'email',
                'max:255',
                Rule::unique( 'teacher_personal_infos', 'email' )
                    ->ignore( $teachersInfo->id ),
            ],

            'phone'             => [
                'required',
                'regex:/^01[3-9]\d{8}$/',
                Rule::unique( 'teacher_personal_infos', 'phone' )
                    ->ignore( $teachersInfo->id ),
            ],

            'permanent_address' => ['required', 'string', 'max:255'],
            'present_address'   => ['required', 'string', 'max:255'],
            'gender'            => ['nullable', 'in:Male,Female,Other'],
            'marital_status'    => ['nullable', 'in:Single,Married,Divorced,Widowed'],
            'image'             => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ] );

        $teachersInfo->update( $validated );

        return redirect()
            ->route( 'teacherInfo.index' )
            ->with( 'success', 'Teacher information updated successfully!' );
    }
    public function delete( string $id ) {
        $teachersInfo = TeacherPersonalInfo::findOrFail( $id );
        $teachersInfo->delete();
        return redirect()->route( 'teacherInfo.index' );
    }
}
