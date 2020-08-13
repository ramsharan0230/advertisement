<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@123'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Vendor',
            'email' => 'vendor@vendor.com',
            'password' => Hash::make('vendor@123'),
            'role_id' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'General',
            'email' => 'general@general.com',
            'password' => Hash::make('general@123'),
            'role_id' => 3
        ]);
    }
}
