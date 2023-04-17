<?php

namespace Database\Seeders;

use App\Models\Preferensi;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class SurveyWithPreferensitableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $faker->seed(1234);
        for ($i = 0; $i < 10; $i++) {
            $survey = Survey::create(['pertanyaan' => $faker->words(5, true) . '?']);
            $pilihan = $faker->randomElement([2, 3]);
            for ($x = 0; $x < $pilihan; $x++) {
                Preferensi::create(
                    [
                        'survey_id' => $survey->id,
                        'jawaban'   => $faker->words(2, true),
                        'nilai'     => $faker->randomElement([
                                            $faker->numberBetween(9, 7),
                                            $faker->numberBetween(6, 5),
                                            $faker->numberBetween(4, 1)
                                        ])
                    ]
                );
            }
        }
    }
}
