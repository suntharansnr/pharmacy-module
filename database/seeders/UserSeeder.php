<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        //create user
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'user_type' => 'user',
            'address' => 'sithankerny jaffna',
            'contact_number' => '0773624880',
            'dob' => '1994-04-13',
            //bypasss email verification
            'email_verified_at' => Carbon::now(),
        ]);

        //pharmacy user
        User::create([
            'name' => 'pharmacy',
            'email' => 'pharmacy@gmail.com',
            'password' => Hash::make('password'),
            'user_type' => 'pharmacy',
            'address' => 'colombo srilanka',
            'contact_number' => '0773624881',
            'dob' => '1996-04-13',
            //bypasss email verification
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
