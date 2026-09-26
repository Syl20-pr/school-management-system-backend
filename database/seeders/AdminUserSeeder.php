<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Principal',
                'password' => Hash::make('password'),
                'usertype' => 'Admin',
                'role' => 'Admin',
                'status' => '1',
            ]
        );

        if (method_exists($user, 'syncRoles')) {
            $user->syncRoles(['admin']);
        }
    }
}
