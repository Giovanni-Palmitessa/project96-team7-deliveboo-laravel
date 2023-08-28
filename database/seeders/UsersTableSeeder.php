<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                "restaurant_id" => "1",
            ],
            [
                "name"      => "Domenico Ferrari",
                "email"     => "domenico.ferrari@gmail.com",
                "password"  => Hash::make('domenico96'),
                "restaurant_id" => "2",
            ],
            [
                "name"      => "Loris Marzocchi",
                "email"     => "loris.marzocchi@gmail.com",
                "password"  => Hash::make('loris96'),
                "restaurant_id" => "3",
            ],
            [
                "name"      => "Giovanni Palmitessa",
                "email"     => "giovanni.palmitessa@gmail.com",
                "password"  => Hash::make('giovanni96'),
                "restaurant_id" => "4",
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
