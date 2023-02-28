<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        /* User::create([
            'name' => 'Lucas de Souza',
            'email' => 'lucassouza@gmail.com',
            'password' => bcrypt('123456'),
        ]); */
    }
}
