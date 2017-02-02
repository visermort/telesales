<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods')->insert([
            'good_name' => 'Часы',
            'goog_price' => '400',
        ]);
        DB::table('goods')->insert([
            'good_name' => 'Детский планшет',
            'goog_price' => '550',
        ]);
        DB::table('services')->insert([
            'services_name' => 'Уборка',
            'services_price' => '1400',
        ]);
        DB::table('services')->insert([
            'services_name' => 'Стирка',
            'services_price' => '550',
        ]);
        DB::table('additional')->insert([
            'additional_name' => 'Курьер',
            'additional_price' => '100',
        ]);
        DB::table('additional')->insert([
            'additional_name' => 'Разгрузка',
            'additional_price' => '300',
        ]);
        DB::table('state')->insert([
            'state_name' => 'Новый',
            'state_slug' => 'new',
        ]);
        DB::table('state')->insert([
            'state_name' => 'В работе',
            'state_slug' => 'on_operator',
        ]);
        DB::table('state')->insert([
            'state_name' => 'Подтверждён',
            'state_slug' => 'accepted',
        ]);
    }
}
