<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si ya existe para no duplicar
        User::updateOrCreate(
            ['email' => 'admin@ds.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('password'),
            ]
        );
    }
}
