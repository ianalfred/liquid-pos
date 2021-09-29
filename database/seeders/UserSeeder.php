<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@mail.com',
            'password' => Hash::make('johndoepassword'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'janedoe@mail.com',
            'password' => Hash::make('janedoepassword'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_id' => 2,
        ]);
    }
}
