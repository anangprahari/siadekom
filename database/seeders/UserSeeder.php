<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate(); 

        $users = collect([
            [
                'name' => 'Syafriadi',
                'username' => 'syafriadi',
                'email' => 'syafriadi.za@gmail.com',
                'password' => Hash::make('Syafriadi123#'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ifnidawati',
                'username' => 'ifnidawati0305',
                'email' => 'ifnidawati0305@gmail.com',
                'password' => Hash::make('Ifnidawati123#'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Desiyusmita',
                'username' => 'desiyusmita7',
                'email' => 'desiyusmita7@gmail.com',
                'password' => Hash::make('Desiyusmita123#'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $users->each(function ($user) {
            User::create($user);
        });
    }
}
