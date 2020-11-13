<?php

namespace Database\Seeders;
use Hash;
use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->Insert([
       		'name'=>'admin',
       		'email'=>'admin@gmail.com',
       		'password'=>Hash::make('admin'),
       		'user_type'=>'admin'
       ]);
    }
}
