<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User([
            'name' => 'Demo',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->save();

    }
}
