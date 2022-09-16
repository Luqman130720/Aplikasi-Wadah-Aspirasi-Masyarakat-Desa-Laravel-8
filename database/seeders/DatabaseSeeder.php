<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' =>'test',
            'username' =>'test',
            'email' =>'test@gmail.com',
            'password' =>bcrypt('1234567890'),
            'role' =>2,
            'image' =>'user-profil/bbbb.jpg',
        ]);
    }
}
