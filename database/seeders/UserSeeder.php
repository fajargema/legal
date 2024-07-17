<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //make user admin
        DB::table('users')->insert([
            'name' => 'Admin Utama',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'roles' => 'admin',
            'position' => 'Manajer Operasional',
            'password' => Hash::make('admin'),
        ]);

        //make user legal
        DB::table('users')->insert([
            'name' => 'User Legal',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'roles' => 'user',
            'position' => 'Legal Officer',
            'password' => Hash::make('user'),
        ]);

        //make user owner
        DB::table('users')->insert([
            'name' => 'Owner Utama',
            'username' => 'owner',
            'email' => 'owner@gmail.com',
            'roles' => 'owner',
            'position' => 'Pemilik Perusahaan',
            'password' => Hash::make('owner'),
        ]);
    }
}
