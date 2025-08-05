<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data users sebelum seeding ulang
        // User::truncate();

        // Data baru yang ingin dimasukkan
        $users = collect([
            [
                'name' => 'Anang',
                'username' => 'anangpraf',
                'email' => 'anang123@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Anang12345#'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Febry',
                'username' => 'febritxt',
                'email' => 'febri123@gmail.com.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Febri12345#'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agung',
                'username' => 'agungyugo',
                'email' => 'agung123@gmail.com.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Agung12345#'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        $users->each(function ($user) {
            User::create($user);
        });
    }
}
