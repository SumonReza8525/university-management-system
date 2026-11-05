<?php
namespace Database\Seeders;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder {
    public function run(): void {
        $names = [
            'Abdul Karim',
            'Mohammad Rahman',
            'Mahmudul Hasan',
            'Abdullah Al Mamun',
            'Shahidul Islam',
            'Sabbir Ahmed',
            'Tanvir Hossain',
            'Mizanur Rahman',
            'Kamrul Hasan',
            'Rafiqul Islam',
            'Shamsul Alam',
            'Nasir Uddin',
            'Jahangir Alam',
            'Saiful Islam',
            'Fahim Ahmed',
            'Arif Hossain',
            'Anwar Hossain',
            'Rezaul Karim',
            'Habibur Rahman',
            'Abu Bakar Siddique',
            'Farzana Akter',
            'Nusrat Jahan',
            'Ayesha Siddika',
            'Sharmin Sultana',
            'Fatema Khatun',
            'Sadia Islam',
            'Nazia Rahman',
            'Mst. Salma Begum',
            'Tania Akter',
            'Rumana Yasmin',
            'Nasrin Sultana',
            'Samira Ahmed',
            'Tahmina Akter',
            'Shahana Parvin',
            'Maliha Islam',
            'Sumaiya Rahman',
            'Jannatul Ferdous',
            'Israt Jahan',
            'Sanjida Akter',
            'Roksana Begum',
            'Mehedi Hasan',
            'Rakibul Islam',
            'Imran Hossain',
            'Shakil Ahmed',
            'Naimur Rahman',
            'Ashraful Islam',
            'Monir Hossain',
            'Faisal Ahmed',
            'Tariqul Islam',
            'Abdur Rahim',
        ];

        $positions = [
            'Professor',
            'Associate Professor',
            'Assistant Professor',
            'Lecturer',
        ];

        $qualifications = [
            'BSc',
            'MSc',
            'BSc, MSc',
            'BBA, MBA',
            'BA, MA',
            'MSc, PhD',
            'BSc, MSc, PhD',
            'MBA, PhD',
        ];

        // Get existing department IDs
        $departmentIds = Department::pluck( 'id' )->toArray();

        if ( empty( $departmentIds ) ) {
            throw new \Exception( 'Please seed departments first.' );
        }

        foreach ( $names as $name ) {
            Teacher::create( [
                'name'          => $name,
                'position'      => $positions[array_rand( $positions )],
                'joining_date'  => fake()->dateTimeBetween(
                    '-15 years',
                    'now'
                )->format( 'Y-m-d' ),
                'qualification' => $qualifications[array_rand( $qualifications )],
                'department_id' => $departmentIds[array_rand( $departmentIds )],
            ] );
        }
    }
}
