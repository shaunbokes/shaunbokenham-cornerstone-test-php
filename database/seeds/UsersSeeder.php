<?php

use Illuminate\Database\Seeder;

use App\User;

/**
 * Class UsersSeeder
 */
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Loyle Kusto\'mah',
            'email' => 'example@test.com',
            'password' => Hash::make('test1234'),
        ]);
    }
}
