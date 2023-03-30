<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $faker->seed(1234);
        for ($i = 0; $i < 15; $i++) {
            User::create([
                'nama' => $faker->firstName,
                'alamat' => $faker->address,
                'telpon' => $faker->bothify('0823########'),
                'foto_ktp' => 'default.png',
                'password' => bcrypt('1234'),
                'is_admin' => $i > 0 ? false : true,
            ]);
        }
    }
}
