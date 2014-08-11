<?php

/**
* We start the app with a user:
*/
class UserTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'username'  => 'admin',
            'password' => Hash::make('admin') 
        ));
    }
}