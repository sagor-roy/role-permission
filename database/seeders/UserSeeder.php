<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 0,
            'role_name' => 'super',
            'password' => Hash::make('000000')
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'role_name' => 'customer',
            'password' => Hash::make('000000')
        ]);
    }
}
