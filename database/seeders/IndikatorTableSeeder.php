<?php

namespace Database\Seeders;

use App\Models\Indikator;
use Illuminate\Database\Seeder;

class IndikatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            Indikator::create([
                'judul' => $faker->sentence(5),
                'isi' => $faker->paragraph,
                'foto' => 'default.jpg',
            ]);
        }
    }
}
