<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::Create([

            'name' => 'Oswaldo Ortiz',
            'user' => 'oswi',
            'type_user' => 1,
            'password_view' => '123',
            'password' => Hash::make(123),
        ]);

        User::Create([

            'name' => 'Edgar Rivas',
            'user' => 'erivas',
            'type_user' => 2,
            'password_view' => '123',
            'password' => Hash::make(123),
        ]);
        User::Create([

            'name' => 'Karen Reyes',
            'user' => 'karen',
            'type_user' => 2,
            'password_view' => '123',
            'password' => Hash::make(123),
        ]);
    }
}