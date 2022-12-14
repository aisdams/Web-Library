<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail,com',
                'level' => 'admin',
                'notelp' => '084898293',
                'password' => bcrypt('admin123'),
            ],
            [
                'username' => 'user',
                'email' => 'user@gmail,com',
                'level' => 'user',
                'notelp' => '082223834',
                'password' => bcrypt('apa123'),
            ]
    
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
