<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = [
            'name' => 'John',
            'email' => 'John@Doe.com',
            'password' => bcrypt('admin987'),
            'email_verified_at' => now(),
            'role' => true,
            'slug' => Hash::make(Str::slug('John-Doe')),
        ];

        User::create($user);
    }
}
