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

        $secret = 'CléSecret';
        $slug = Hash::make(Str::slug('John-Doe'));
        $hmac = hash_hmac('sha256', $slug, $secret);
        $slugCry = rtrim(strtr(base64_encode($hmac), '+/', '-_'), '=');

        $user = [
            'name' => 'John',
            'email' => 'John@Doe.com',
            'password' => bcrypt('admin987'),
            'email_verified_at' => now(),
            'role' => true,
            'slug' => $slugCry,
        ];

        User::create($user);
    }
}
