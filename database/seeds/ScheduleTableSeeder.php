<?php

use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = new \DateTime('today');

        App\Models\Schedule::create([
            'team1'          => 'USA',
            'team1_score'    => 0,
            'team2'          => 'Australia',
            'team2_score'    => 0,
            'time_from'      => $time->format('Y-m-d H:i:s'),
            'time_until'     => $time->format('Y-m-d H:i:s')
        ]);

        App\Models\Schedule::create([
            'team1'          => 'Brazil',
            'team1_score'    => 89,
            'team2'          => 'China',
            'team2_score'    => 76,
            'time_from'      => $time->modify('-2 hours')->format('Y-m-d H:i:s'),
            'time_until'     => $time->modify('-1 hour')->format('Y-m-d H:i:s')
        ]);

        App\Models\Schedule::create([
            'team1'          => 'Russia',
            'team1_score'    => 102,
            'team2'          => 'Japan',
            'team2_score'    => 101,
            'time_from'      => $time->modify('-4 hour')->format('Y-m-d H:i:s'),
            'time_until'     => $time->modify('-2 hours')->format('Y-m-d H:i:s')
        ]);

        App\Models\Schedule::create([
            'team1'          => 'USA',
            'team1_score'    => 0,
            'team2'          => 'Spain',
            'team2_score'    => 0,
            'time_from'      => $time->modify('+4 hours')->format('Y-m-d H:i:s'),
            'time_until'     => $time->modify('+7 Hours')->format('Y-m-d H:i:s')
        ]);        
    }
}
