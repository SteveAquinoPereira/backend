<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = new User();
            $user->first_name = "William";
            $user->last_name = "Gonzalez";
            $user->cedula = "28211592";
            $user->address = "Trigal Sur";
            $user->phone_number = "04144232128";
            $user->password = bcrypt("811200818");
            $user->email = "wjga2001.unitec@gmail.com";
            $user->id_section01 = null;
            $user->id_gender01 = 1;
            $user->id_user_type01 = 1;
            $user->accepted = true;
            $user->save();

            $user = new User();
            $user->first_name = "Hector";
            $user->last_name = "Vasquez";
            $user->cedula = "28295124";
            $user->address = "Naguanagua";
            $user->phone_number = "04145612034";
            $user->password = bcrypt("1234abcd");
            $user->email = "hssvquez@gmail.com";
            $user->id_section01 = null;
            $user->id_gender01 = 1;
            $user->id_user_type01 = 4;
            $user->accepted = false;
            $user->save();

            $user = new User();
            $user->first_name = "Jose";
            $user->last_name = "Pineda";
            $user->cedula = "28550155";
            $user->address = "Ciudad Alianza";
            $user->phone_number = "04144986012";
            $user->password = bcrypt("abcd1234");
            $user->email = "josepineda@gmail.com";
            $user->id_section01 = null;
            $user->id_gender01 = 1;
            $user->id_user_type01 = 4;
            $user->accepted = false;
            $user->save();

            $user = new User();
            $user->first_name = "Poy";
            $user->last_name = "Lou";
            $user->cedula = "28050481";
            $user->address = "Guataparo";
            $user->phone_number = "04169103254";
            $user->password = bcrypt("asdf1234");
            $user->email = "poylou23@gmail.com";
            $user->id_section01 = null;
            $user->id_gender01 = 2;
            $user->id_user_type01 = 4;
            $user->accepted = false;
            $user->save();

            $user = new User();
            $user->first_name = "Yohana";
            $user->last_name = "Pineda";
            $user->cedula = "28642198";
            $user->address = "Trigal";
            $user->phone_number = "04126451380";
            $user->password = bcrypt("1234asdf");
            $user->email = "poylou23@gmail.com";
            $user->id_section01 = null;
            $user->id_gender01 = 2;
            $user->id_user_type01 = 4;
            $user->accepted = false;
            $user->save();
    }

}
