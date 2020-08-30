<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 29)->create();

        User::create([
            'name' => 'lorem ipsum',
            'email' => 'lorem@ipsum.com',
            'password' => bcrypt('laravel')
        ]);

    }
}
