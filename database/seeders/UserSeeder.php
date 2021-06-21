<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        DB::table('users')->insert([
            'first_name'=>'Super',
            'last_name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345678'),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'remember_token'=>Str::random(10),

        ]);
    }
}
