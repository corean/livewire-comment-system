<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name'     => 'corean',
            'email'    => 'corean@corean.biz',
            'password' => bcrypt('secret'),
        ]);

        User::factory()->create([
            'name'     => 'na6858',
            'email'    => 'na6858@naver.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
