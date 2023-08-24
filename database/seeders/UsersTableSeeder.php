<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [
            [
                "name"      => "Davide Farci",
                "email"     => "davide.farci@gmail.com",
                "password"  => Hash::make('davide96'),
                "image"     => null,
            ],
            [
                "name"      => "Domenico Ferrari",
                "email"     => "domenico.ferrari@gmail.com",
                "password"  => Hash::make('domenico96'),
                "image"     => null,
            ],
            [
                "name"      => "Loris Marzocchi",
                "email"     => "loris.marzocchi@gmail.com",
                "password"  => Hash::make('loris96'),
                "image"     => null,
            ],
            [
                "name"      => "Giovanni Palmitessa",
                "email"     => "giovanni.palmitessa@gmail.com",
                "password"  => Hash::make('giovanni96'),
                "image"     => null,
            ],
        ];
       
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
