<?php
namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {$sessions = [
        '2011-2012',
        '2012-2013',
        '2013-2014',
        '2014-2015',
        '2015-2016',
        '2016-2017',
        '2017-2018',
        '2018-2019',
        '2019-2020',
        '2020-2021',
        '2021-2022',
        '2022-2023',
        '2023-2024',
        '2024-2025',
        '2025-2026',
        '2026-2027',
        '2027-2028',
        '2028-2029',
        '2029-2030',
        '2030-2031',
    ];

        foreach ( $sessions as $session ) {
            Session::create( [
                'session' => $session,
            ] );
        }}
}
