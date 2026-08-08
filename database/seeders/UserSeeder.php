<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gui.com'],
            [
                'name' => 'Admin Operasional',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'pimpinan@gui.com'],
            [
                'name' => 'Pimpinan Manajemen',
                'password' => Hash::make('password123'),
                'role' => 'pimpinan',
            ]
        );

        User::updateOrCreate(
            ['email' => 'operasional@gui.com'],
            [
                'name' => 'Operasional Lapangan',
                'password' => Hash::make('password123'),
                'role' => 'operasional',
            ]
        );
    }
}
