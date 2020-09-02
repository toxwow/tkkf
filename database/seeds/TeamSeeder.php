<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'Wczorajsi',
            'information' => 'Siema tutaj info o wczorajszych',
            'league_id' => '1',
            'address' => 'Oś. Wysokie 6',
            'date' => 'Wtorek 19:30',
            'capitan' => 2,
        ]);

        DB::table('teams')->insert([
            'name' => 'Dzisiejsi',
            'information' => 'Siema tutaj info o wczorajszych',
            'league_id' => '1'
        ]);
        DB::table('teams')->insert([
            'name' => 'Jutrzejsi',
            'information' => 'Siema tutaj info o wczorajszych',
            'league_id' => '1'
        ]);
    }
}
