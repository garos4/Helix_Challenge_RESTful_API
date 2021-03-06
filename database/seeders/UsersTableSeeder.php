<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Database seeder for users.
     *
     * @return void
     */
    public function run()
    {
        // create array of users of the system users
        $users=[
            [
                'first_name'=>'Benjamin', 
                'last_name'=>'Mba', 
                'email'=>'benmba4@gmail.com',
                'password'=>'letmein'
            ],
            [
                'first_name'=>'Kristoffer', 
                'last_name'=>'Tonning', 
                'email'=>'kristoffer@helixsleep.com',
                'password'=>'letmein'
            ],
        ];

        // loop through the list of users
        foreach($users as $user){
            
            // check if user email already exists
            $user_record= User::where('email',$user['email'])->first();
            
            if($user_record){
                
                // if email already exists, update the first name and last name
                $user_record->first_name = $user['first_name'];
                $user_record->last_name = $user['last_name'];
                $user_record->password = Hash::make($user['password']);
                $user_record->save();
           
            }
            else{

                // if it does not exist, that means we have a new user record 
                // so we create and save it
                $user_record = new User();
                $user_record->first_name = $user['first_name'];
                $user_record->last_name = $user['last_name'];
                $user_record->email = $user['email'];
                $user_record->password = Hash::make($user['password']);
                $user_record->save();

            } 
            
        }
        
    }
}
