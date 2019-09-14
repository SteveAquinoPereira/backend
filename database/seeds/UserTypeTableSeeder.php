<?php

use Illuminate\Database\Seeder;
use App\UserType;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userType = new UserType();
        $userType->user_type_name = "Administrador"; 
        $userType->save();

        $userType = new UserType();
        $userType->user_type_name = "Preparador"; 
        $userType->save();

        $userType = new UserType();
        $userType->user_type_name = "Estudiante"; 
        $userType->save();

        $userType = new UserType();
        $userType->user_type_name = null; 
        $userType->save();
    }
}
