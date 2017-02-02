<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_name' => 'admin',
            'user_email' => config('telesales.adminEmail'),
            'password' => bcrypt(config('telesales.adminPasswordStart')),
        ]);
    }
}
