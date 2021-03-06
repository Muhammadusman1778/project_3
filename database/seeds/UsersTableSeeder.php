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
        User::create([

            'name'=>'admin',
            'password'=>bcrypt('admin'),
            'email'=>'admin@admin.com.pk',
            'admin'=>1,
            'avatar'=>asset('avatar/avatar.png')
        ]);

        User::create([

            'name'=>'usama',
            'password'=>bcrypt('admin'),
            'email'=>'usama@friend.com.pk',
            'admin'=>0,
            'avatar'=>asset('avatar/avatar.png')
        ]);
    }
}
