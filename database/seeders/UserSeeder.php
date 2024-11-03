<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRoleId = DB::table('roles')->where('name', 'admin')->first()->id ?? null;
        User::create([
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'roleId' => $adminRoleId,
        ]);

        $koordinatorRoleId = DB::table('roles')->where('name', 'koordinator')->first()->id ?? null;
        User::create([
            'email' => 'koordinator@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'roleId' => $koordinatorRoleId,
        ]);
    }
}
