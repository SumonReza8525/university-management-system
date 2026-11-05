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
            ['id' => 1, 'name' => 'Computer Science'],
            ['id' => 2, 'name' => 'Information Technology'],
            ['id' => 3, 'name' => 'Software Engineering'],
            ['id' => 4, 'name' => 'Electrical Engineering'],
            ['id' => 5, 'name' => 'Electronics Engineering'],
            ['id' => 6, 'name' => 'Civil Engineering'],
            ['id' => 7, 'name' => 'Mechanical Engineering'],
            ['id' => 8, 'name' => 'Business Administration'],
            ['id' => 9, 'name' => 'Accounting'],
            ['id' => 10, 'name' => 'Finance'],
            ['id' => 11, 'name' => 'Marketing'],
            ['id' => 12, 'name' => 'Management'],
            ['id' => 13, 'name' => 'Economics'],
            ['id' => 14, 'name' => 'English'],
            ['id' => 15, 'name' => 'Mathematics'],
            ['id' => 16, 'name' => 'Physics'],
            ['id' => 17, 'name' => 'Chemistry'],
            ['id' => 18, 'name' => 'Biology'],
            ['id' => 19, 'name' => 'Statistics'],
            ['id' => 20, 'name' => 'Sociology'],
            ['id' => 21, 'name' => 'Political Science'],
            ['id' => 22, 'name' => 'History'],
            ['id' => 23, 'name' => 'Geography'],
            ['id' => 24, 'name' => 'Psychology'],
            ['id' => 25, 'name' => 'Education'],
            ['id' => 26, 'name' => 'Law'],
            ['id' => 27, 'name' => 'Pharmacy'],
            ['id' => 28, 'name' => 'Public Health'],
            ['id' => 29, 'name' => 'Environmental Science'],
            ['id' => 30, 'name' => 'Architecture'],
        ];

        foreach ( $departments as $department ) {
            Department::create( [
                'id'   => $department['id'],
                'name' => $department['name'],
            ] );
        }
    }
}
