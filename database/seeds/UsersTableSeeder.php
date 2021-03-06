<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon as IlluminateCarbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class,30)->create();

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'remember_token' => Str::random(10),
                'email_verified_at' => Carbon::now(),
                'api_token' => Str::random(18),
                'is_admin' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name' => 'user',
                'email' => 'user@user.com',
                'username' => 'user',
                'password' => bcrypt('user'),
                'remember_token' => Str::random(10),
                'email_verified_at' => Carbon::now(),
                'api_token' => Str::random(18),
                'is_admin' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        \App\Models\User::insert($users);
    }
}
