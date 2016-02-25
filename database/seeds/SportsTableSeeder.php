<?php

use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->delete();

        Sport::create([
            'name'              => 'Basketball'
        ]);

        Sport::create([
            'name'              => 'Tennis'
        ]);

        Sport::create([
            'name'              => 'Football'
        ]);
    }
}
