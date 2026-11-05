<?php
namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $departments = [
            'Computer Science',
            'Information Technology',
            'Software Engineering',
            'Electrical Engineering',
            'Electronics Engineering',
            'Civil Engineering',
            'Mechanical Engineering',
            'Business Administration',
            'Accounting',
            'Finance',
            'Marketing',
            'Management',
            'Economics',
            'English',
            'Mathematics',
            'Physics',
            'Chemistry',
            'Biology',
            'Statistics',
            'Sociology',
            'Political Science',
            'History',
            'Geography',
            'Psychology',
            'Education',
            'Law',
            'Pharmacy',
            'Public Health',
            'Environmental Science',
            'Architecture',
        ];

        foreach ( $departments as $department ) {
            Department::create( [
                'name' => $department,
            ] );
        }
    }
}
