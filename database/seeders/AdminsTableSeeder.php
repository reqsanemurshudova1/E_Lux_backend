<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash; // Hash facade'ini ekledik

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
          
            [
                
                'name' => 'Admin',
                'email' => 'admin1@example.com',
                'type' => 'admin',
                'status' => 1,
                'mobile' => '9800000',
                'image' => '',
              'password'=>Hash::make('123456'),
            ],
        ];
        
        Admin::insert($adminRecords);
    }
}
