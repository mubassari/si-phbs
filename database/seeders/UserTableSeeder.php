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
            $nama = $i < 1 ? 'Admin' : ($i < 2 ? 'Iva' :  $faker->firstName);
            $telpon = $i < 1 ? '087833445566' : ($i < 2 ? '087833445577' :  $faker->bothify('0857########'));
            User::create([
                'nama' => $nama,
                'alamat' => $faker->address,
                'telpon' => $telpon,
                'foto_ktp' => 'default.png',
                'password' => bcrypt('1234'),
                'is_admin' => $i > 0 ? false : true,
            ]);
        }
    }
}
