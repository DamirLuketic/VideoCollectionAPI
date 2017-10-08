<?php

use App\User;
use Illuminate\Database\Seeder;

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
                    'country_code'  => 'HR',
                    'name'          => 'Damir',
                    'email'         => 'luketic.damir@gmail.com',
                    'password'      => 'pass11',
                    'is_confirmed'  => 1
                ]
            ];

        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
