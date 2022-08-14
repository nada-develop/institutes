<?php

namespace Database\Seeders;

use App\Models\Institute;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
            $institutes =  Institute::all();
            foreach($institutes as $institute){
                User::create([
                    'name' => $institute->name,
                    'email' => 'IN'.$institute->code.'@gmail.com',
                    'password'       => bcrypt('12345678'),
                    'institute_code' => $institute->code,
                    'region_code' =>$institute->region_code,
                    'management_code'=>$institute->management_code,
                ]);
            }
    }
}
