<?php

namespace Database\Seeders;

use App\Models\Credit;
use App\Models\ImeiLimit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'otp' => '',
            'status' => 'active',
            'type' => 'admin',
        ]);

        //Create user
        $user = User::create([
            'ip' => '127.0.0.1',
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('12345678'),
            'otp' => '',
            'status' => 'active',
            'type' => 'user',
        ]);

        // Create IMEI limit for the last created user
        ImeiLimit::create([
            'ip' => '127.0.0.1',
            'user_id' => $user->id,
            'limit' => '3', // Replace with actual IMEI
        ]);

        // Create Credit for the last created user
        Credit::create([
            'ip' => '127.0.0.1',
            'user_id' => $user->id,
            'credit' => '0',
        ]);
    }
}
