<?php
namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $years = ['1st', '2nd', '3rd', '4th', 'MSC', 'PHD'];

        foreach ( $years as $year ) {
            Year::create( [
                'year' => $year,
            ] );
        }
    }
}
