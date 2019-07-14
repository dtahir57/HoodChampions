<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Super User';
        $user->email = 'super_user@gmail.com';
        $user->phone_number = '123456789';
        $user->password = bcrypt('password');
        $user->password = 1;
        $user->save();

        $user->assignRole('Super_User');
    }
}
