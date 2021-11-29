<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'email' => 'admin@example.com',
            'ic' => '961124065045',
            'password' => Hash::make('admin'),
            'role' => 'individu',
            'phone_no' => '0176754281',
        ]);
    }
}
