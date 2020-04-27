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
            'name' => 'Anton Sirik',
            'slug' => 'anton-sirik',
            'email' => 'antonsirik@gmail.com',
            'password' => Hash::make('Nothing1211'),
            'manager' => true
        ]);
    }
}
