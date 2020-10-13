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
            'name' => 'Tomasz',
            'surname' => 'Tomżyński',
            'email' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('Mistrz1234!'),
        ]);
    }
}
