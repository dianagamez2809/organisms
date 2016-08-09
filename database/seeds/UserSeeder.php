<?php

class UserSeeder extends Seeder
{

public function run()
{
    DB::table('usuarios')->delete();
    User::create(array(
        'username' => 'anette',
        'password' => Hash::make('System1.pass'),
    ));
}

}