<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat user admin dengan profil
        DB::transaction(function () {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]);
            Profile::create(['user_id' => $user->id]);
        });

        // Buat user owner
        DB::transaction(function () {
            $user = User::create([
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'owner',
            ]);
            Profile::create(['user_id' => $user->id]);
        });

        // Buat user peminjam
        DB::transaction(function () {
            $user = User::create([
                'name' => 'Peminjam',
                'email' => 'peminjam@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'peminjam',
            ]);
            Profile::create(['user_id' => $user->id]);
        });
    }
}