<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@itsolutionstuff.com',
                'admin' => '1',
                'nic' => '123456789V',
                'phone' => '0712345678',
                'address' => 'Colombo',
                'role' => '1',
                'registered_at' => '2024.04.19',

                'password' => bcrypt('123456'),
            ],
            [

                'name' => 'Kamal',
                'email' => 'kamal@gmail.com',
                'admin' => '0',
                'nic' => '1253246834V',
                'phone' => '0712341234',
                'address' => 'Kandy',
                'role' => '0',
                'registered_at' => '2024.04.19',

                'password' => bcrypt('123456'),
            ],
            [

                'name' => 'Nimal',
                'email' => 'nimal@gmail.com',
                'admin' => '0',
                'nic' => '5625648578V',
                'phone' => '0756785678',
                'address' => 'Galle',
                'role' => '0',
                'registered_at' => '2024.04.19',

                'password' => bcrypt('123456'),
            ],
            [

                'name' => 'Sunil',
                'email' => 'sunil@gmail.com',
                'admin' => '0',
                'nic' => '187945895V',
                'phone' => '0711593578',
                'address' => 'Matara',
                'role' => '0',
                'registered_at' => '2024.04.19',

                'password' => bcrypt('123456'),
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        $this->call(BookCateSeeder::class);
    }
}
