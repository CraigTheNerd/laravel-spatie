<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Create Roles using this seeder
        Role::create(['name' => 'student']);
        Role::create(['name' => 'agent']);
        Role::create(['name' => 'admin']);
    }
}
