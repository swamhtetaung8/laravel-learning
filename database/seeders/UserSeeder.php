<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        User::factory()->create([
            'name' => 'Swam Htet Aung',
            'email' => 'swamhtetaungg@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdffdsa')
        ]);
    }
}
