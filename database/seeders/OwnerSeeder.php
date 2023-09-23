<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        $pass = '5+1NK<4Kx!F9y(7Mca,nd)i6kPz!.o';
        User::create([
            'id' => 1,
            'name' => 'langfiles',
            'email' => 'admin@langfiles.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($pass),
            'owner' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
