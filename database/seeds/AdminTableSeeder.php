<?php

use Illuminate\Database\Seeder;
use App\User;



class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'admin';
        $user->email = 'admin@rfn.com';
        $user->password = 'admin';
        $user->verified = true;
        $user->save();
        // Assign User a Role
        Bouncer::assign('admin')->to($user);
    }
}

