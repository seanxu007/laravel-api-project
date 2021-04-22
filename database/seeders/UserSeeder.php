<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Sean';
        $user->password = Hash::make('abc123');
        $user->email = 'test@gmail.com';
        $user->email_verified_at = now();
        $user->save();
    }
}
