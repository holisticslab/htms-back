<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Company;
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
            'fullname' => "irsyad",
            'ic' => '961124065045',
            'password' => Hash::make('admin'),
            'role_id' => 1,
            'phone_no' => '0176754281',
        ]);

        Role::create(
        [
            'role_type' => 'admin',
            'role_desc' => 'Super admin, monitoring system'
        ], 
        [
            'role_type' => 'personal',
            'role_desc' => 'personal, use system for personal'
        ], 
        [
            'role_type' => 'company',
            'role_desc' => 'company, use system for company'
        ]);

        Company::create([
            'company_name' => 'Holistics Lab',
            'company_register_no' => '1151997-T',
            'company_type' => 'Halal Service Provider',
            'company_details' => 'HOLISTICS Lab Sdn Bhd mission is to promote research, development and commercialization activities in organizational, social and technological aspects of the Halal industry with the aim to preserve and maintain the integrity of products and services across the Halal supply chain. Our company deals with the computation, cognitive and social aspects of resources, devices, methods, techniques, and methodologies required to optimize the acquisition, storage, retrieval, and use of information in Halal supply chain (Farm to Fork) based on halal standard and Shariah Law.'
        ]);
    }
}
