<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'first_name' => 'Test',
                'last_name' => 'User',
                'date_of_birth' => '1990-01-01',
                'country' => 'Netherlands',
                'address' => 'Teststraat 1',
                'postal_code' => '1234 AB',
                'city' => 'Teststad',
                'phone_number' => '0612345678',
                'email' => 'test@user.com',
                'password' => Hash::make('wachtwoord'),
            ]
        );
    }
}
