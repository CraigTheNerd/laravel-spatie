<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Add admin user
//        $user = User::create([
//            'name' => 'admin',
//            'email' => 'admin@admin.com',
//            'email_verified_at' => now(),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//        ]);

        //  Assign a single role to the user
        //$user->assignRole('admin');

        //  Assign multiple roles to the user
        //$user->assignRole('agent', 'admin');

        //  Assign multiple roles to the user with an array
        //$user->assignRole(['agent', 'admin']);


        //  A better way to create and assign at the same time
        //  Add admin user
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('agent', 'admin');

    }
}
