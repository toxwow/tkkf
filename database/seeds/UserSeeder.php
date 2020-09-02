<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Tomasz Tomżyński',
            'email' => 'admin',
            'role' => 'admin',
            'team_id' => '',
            'password' => Hash::make('Mistrz1234!'),
        ]);

        DB::table('users')->insert([
            'name' => 'Krzysztof Zabawa',
            'email' => 'zabawa',
            'role' => 'capitan',
            'team_id' => 1,
            'password' => Hash::make('Mistrz1234!'),
        ]);
    }
}
