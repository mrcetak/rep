<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

    $peranadmin = new Role();
    $peranadmin->name = "admin";
    $peranadmin->display_name = "Bos Besar Admin";
    $peranadmin->save();

    $peranop = new Role();
    $peranop->name = "operator";
    $peranop->display_name = "menteri op";
    $peranop->save();

    $peranpinjam = new Role();
    $peranpinjam->name = "peminjam";
    $peranpinjam->display_name = "borrower";
    $peranpinjam->save();


        $user = new User();
        $user->name = "Administrator";
        $user->email = "admin@ukk.com";
        $user->password = bcrypt('1234');
        $user->save();
        $user->attachRole($peranadmin);

        $user = new User();
        $user->name = "Operator";
        $user->email = "op@ukk.com";
        $user->password = bcrypt('1234');
        $user->save();
        $user->attachRole($peranop);

        $user = new User();
        $user->name = "Peminjam";
        $user->email = "peminjam@ukk.com";
        $user->password = bcrypt('1234');
        $user->save();
        $user->attachRole($peranpinjam);
    }
}
