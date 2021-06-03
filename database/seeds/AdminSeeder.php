<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
       "fullname" => "M. Firli alikhul akbar",
       "password" => Hash::make("123123123"),
       "email" => "admin",
       "username" => "admin",
       "phone" => "085549074731",
     ]);
    }
}
