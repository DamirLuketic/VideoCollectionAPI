<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users =
            [
                [
                    'role_id'       => 1,
                    'country_id'    => 53,
                    'name'          => 'Damir',
                    'email'         => 'luketic.damir@gmail.com',
                    'password'      => 'pass11',
                    'is_confirmed'  => 1
                ]
            ];

        $users_hash =  [];
        foreach ($users as $user)
        {
            $user['password'] = Hash::make($user['password']);
            $users_hash[] = $user;
        }

        DB::table('users')->insert($users_hash);
    }
}
