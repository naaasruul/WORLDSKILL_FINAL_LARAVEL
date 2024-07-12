<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Eloquent - transformation of SQL query into class and method (ORM)

        User::create([
            'name'=>'Admin',
            'password'=>Hash::make('Password'),
            'role'=>1
        ]);
    }
}
