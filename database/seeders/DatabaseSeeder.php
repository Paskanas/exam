<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //users
        DB::table('users')->insert([
            'name' => 'Mamutas',
            'email' => 'mamutas@gmail.com',
            'password' => Hash::make('123')
        ]);
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
            'role' => 10
        ]);


        //restorants
        DB::table('restorants')->insert([
            'title' => 'Restoranas1',
            'code' => 12345,
            'address' => 'Vilnius Sauletekio aleja 10'
        ]);
        DB::table('restorants')->insert([
            'title' => 'Restoranas2',
            'code' => 2345,
            'address' => 'Vilnius Nemenčinės pl. 12'
        ]);


        //menus
        DB::table('menus')->insert([
            'restorant_id' => 1,
            'title' => 'Dienos pietus'
        ]);
        DB::table('menus')->insert([
            'restorant_id' => 2,
            'title' => 'Pusryčiai'
        ]);


        //dishes
        DB::table('dishes')->insert([
            'menu_id' => 1,
            'title' => 'Pizza',
            'about' => 'Very delicious'
        ]);
        DB::table('dishes')->insert([
            'menu_id' => 2,
            'title' => 'Burger',
            'about' => 'Tasty'
        ]);
        DB::table('dishes')->insert([
            'menu_id' => 1,
            'title' => 'Pasta',
            'about' => 'Long noodles'
        ]);
    }
}
