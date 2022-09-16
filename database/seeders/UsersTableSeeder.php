<?php

namespace Database\Seeders;

use App\Models\Institute;
use App\Models\Management;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        $admin = User::create([
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => bcrypt('password'),
            'remember_token' => null,
        ]);

        $admin->roles()->sync(1);

        $regions =  Region::all();
        foreach ($regions as $region) {
            $r_user = User::create([
                'name' => $region->name,
                'email' => 'REG' . $region->code . '@gmail.com',
                'password'       => bcrypt('12345678'),
                'region_code' => $region->code,
                'active_region' => 1,
            ]);
            $r_user->roles()->sync(2);
        }

        $managements =  Management::all();
        foreach ($managements as $management) {
            $m_user = User::create([
                'name' => $management->name,
                'email' => 'MAN' . $management->code . '@gmail.com',
                'password'       => bcrypt('12345678'),
                'region_code' => $management->region_code,
                'active_management' => 1,
                'management_code' => $management->code
            ]);

            $m_user->roles()->sync(2);
        }

        $institutes =  Institute::all();
        foreach ($institutes as $institute) {
            $ins_user =  User::create([
                'name' => $institute->name,
                'email' => 'INS' . $institute->code . '@gmail.com',
                'password'       => bcrypt('12345678'),
                'institute_code' => $institute->code,
                'region_code' => $institute->region_code,
                'management_code' => $institute->management_code
            ]);
            $ins_user->roles()->sync(2);
        }
    }
}
