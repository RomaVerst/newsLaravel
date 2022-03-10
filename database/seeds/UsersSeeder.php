<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'is_admin' => true,
            'email' => 'admin@admin.ru',
            'email_verified_at' => now(),
            'password' =>   Hash::make('123'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        factory(App\User::class, 10)->create();
    }
}
