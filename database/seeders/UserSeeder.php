<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $new_user = new User();
            $new_user->name = $faker->firstName();
            $new_user->surname = $faker->lastName();
            $new_user->email = $faker->email();
            $new_user->save();
        }
    }
}
