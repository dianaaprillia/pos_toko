<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Mahasiswa Polije',
            'email'    => 'mahasiswa@polije.ac.id',
            'password' => Hash::make('Polije1234'),
        ]);
    }
}