<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            User::create([
                    'id' => '1',
                    'name' => 'Demo (Staff)',
                    'email' => 'demo_staff@fgvholdings.com',
                    'password'=> bcrypt('123'),
                    'staff_no' => '123456',
                    'mobile_no' => '0123456789',
                    'block' => 'A',
                    'position' => 'Ketua Blok',
                    'status' => 'active',
                    'role' => 'staff'
            ]);

            User::create([
                    'id' => '2',
                    'name' => 'Norsyahima Azizi',
                    'email' => 'norsyahima.a@fgvholdings.com',
                    'password'=> bcrypt('123'),
                    'staff_no' => '111111',
                    'mobile_no' => '0195509541',
                    'block' => 'B',
                    'position' => 'Juruanalisa Makmal',
                    'status' => 'active',
                    'role' => 'staff'
            ]);

            User::create([
                    'id' => '3',
                    'name' => 'Suhaila Sulaiman',
                    'email' => 'suhaila.s@fgvholdings.com',
                    'password'=> bcrypt('123'),
                    'staff_no' => '222222',
                    'mobile_no' => '01232345344',
                    'block' => 'C',
                    'position' => 'Kerani',
                    'status' => 'active',
                    'role' => 'staff'
            ]);

            User::create([
                    'id' => '4',
                    'name' => 'Anna Baizura Mispani',
                    'email' => 'anna.b@fgvholdings.com',
                    'password'=> bcrypt('123'),
                    'staff_no' => '333333',
                    'mobile_no' => '0196654765',
                    'block' => 'BMC',
                    'position' => 'HR',
                    'status' => 'active',
                    'role' => 'supervisor'
            ]);

            User::create([
                    'id' => '5',
                    'name' => 'Nizam Yahaya',
                    'email' => 'nizam.yahaya@fgvholdings.com',
                    'password'=> bcrypt('123'),
                    'staff_no' => '444444',
                    'mobile_no' => '0132265744',
                    'block' => 'FMU',
                    'position' => 'Technician',
                    'status' => 'active',
                    'role' => 'technician'
            ]);

            User::create([
                    'id' => '6',
                    'name' => 'Demo (Supervisor)',
                    'email' => 'demo_supervisor@fgvholdings.com',
                    'password'=> bcrypt('123'),
                    'staff_no' => '543455',
                    'mobile_no' => '0121133224',
                    'block' => 'C1',
                    'position' => 'Supervisor',
                    'status' => 'active',
                    'role' => 'supervisor'
            ]);

            User::create([
                    'id' => '7',
                    'name' => 'Demo (Technician)',
                    'email' => 'demo_technician@fgvholdings.com',
                    'password'=> bcrypt('123'),
                    'staff_no' => '321321',
                    'mobile_no' => '0127765453',
                    'block' => 'FMU',
                    'position' => 'Technician',
                    'status' => 'active',
                    'role' => 'technician'
            ]);
    }
}