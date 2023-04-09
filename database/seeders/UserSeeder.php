<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'type'=>0,
                'password'=> Hash::make(11223344),
            ],
            [
                'name'=>'Staff',
                'email'=>'staff@gmail.com',
                'type'=>1,
                'password'=> Hash::make(11223344),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
