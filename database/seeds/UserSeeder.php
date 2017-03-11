<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user = (new User())->fill(['name' => 'demo', 'password' => Hash::make('123456'), 'email' => 'demo@example.com']);
        $admin = Role::where('name', '=', 'admin')->first();
        $user->save();
        $user->attachRole($admin);
    }
}
