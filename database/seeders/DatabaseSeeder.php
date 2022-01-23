<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use App\Models\Course;
use App\Models\Billing;
use App\Models\Training;
use App\Models\Trainee;
use App\Models\State;
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
        
        Role::create([
            'role_type' => 'admin',
            'role_desc' => 'Super admin, monitoring system'
        ]);
        
        Role::create([
            'role_type' => 'personal',
            'role_desc' => 'personal, use system for personal'
        ]);

        Role::create([
            'role_type' => 'company',
            'role_desc' => 'company, use system for company'
        ]);

        Company::create([
            'company_name' => 'Holistics Lab',
            'company_register_no' => '1151997-T',
            'company_type' => 'Halal Service Provider',
            'company_branch' => 'HQ',
            'company_details' => 'HOLISTICS Lab Sdn Bhd mission is to promote research, development and commercialization activities in organizational, social and technological aspects of the Halal industry with the aim to preserve and maintain the integrity of products and services across the Halal supply chain. Our company deals with the computation, cognitive and social aspects of resources, devices, methods, techniques, and methodologies required to optimize the acquisition, storage, retrieval, and use of information in Halal supply chain (Farm to Fork) based on halal standard and Shariah Law.',
            'company_address' => 'Medini 7'
        ]);
        
        User::create([
            'email' => 'admin@example.com',
            'fullname' => "irsyad",
            'ic' => '961124065045',
            'password' => Hash::make('admin'),
            'role_id' => 1,
            'phone_no' => '0176754281',
            'company_id' => '1'
        ]);

        Company::create([
            'company_name' => 'Ikom Solutions',
            'company_register_no' => '1111111-V',
            'company_type' => 'IT Service Provider',
            'company_branch' => '',
            'company_details' => 'Slowly but surely',
            'company_address' => 'Semenyih, Selangor'
        ]);

        Course::create([
            'max_student' => '10',
            'course_name' => 'PCIHA',
            'course_desc' => 'Kelas bersama mira',
            'course_fee' => 200,
            'course_image' => 'https://training.holisticslab.my/wp-content/uploads/2021/05/PCHE-1024x724.png',
        ]);

        Billing::create([
            'biller_name' => 'Holis Tic Lab',
            'biller_address' => 'Med 7',
            'biller_phone_no' => '0111111',
            'biller_email' => '@holisticslab.my',
            'biller_subject' => 'Testing',
            'biller_notes' => 'Im a happy boy'
        ]);

        Training::create([
            'course_id' => 1,
            'train_name' => 'Module Introduction',
            'train_place' => 'Webex',
            'train_desc' => 'Testing 123',
            'train_state' => 'Johor',
            'train_include' => 'Breakfast and drinks are provided',
            'train_address' => 'Nusajaya JB',
            'train_date_start' => '2021-12-12',
            'train_date_end' => '2021-12-15',
            'train_mode' => 'online',
            'train_cohort' => '100'
        ]);

        Trainee::create([
            'company_id' => 1,
            'training_id' => 1,
            'trainee_name' => 'Athari',
            'trainee_ic' => '1111111',
            'trainee_email' => 'athari@gmail.com',
            'trainee_phoneno' => '11111'
        ]);

        Trainee::create([
            'company_id' => 1,
            'training_id' => 1,
            'trainee_name' => 'Mira',
            'trainee_ic' => '222222',
            'trainee_email' => 'mira@gmail.com',
            'trainee_phoneno' => '1122111'
        ]);

        State::create([
            'state_code' => '01',
            'state_name' => 'Johor',
        ]);

        State::create([
            'state_code' => '02',
            'state_name' => 'Melaka',
        ]);

        
    }
}
