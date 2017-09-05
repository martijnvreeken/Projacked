<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Projacked\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@kapibara.media',
            'password' => bcrypt('admin123')
        ]);
    }
}
