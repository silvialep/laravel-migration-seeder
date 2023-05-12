<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class TrainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++) {
            $newTrain = new Train();


            $newTrain->company = $faker->word();
            $newTrain->departure_station = $faker->city();
            $newTrain->arrival_station = $faker->city();
            $newTrain->departure_time = $faker->dateTimeInInterval('-1 week', '+1 month');
            $newTrain->arrival_time = $faker->dateTimeInInterval($newTrain->departure_time, '+1 month');
            $newTrain->train_code = $faker->numberBetween(1, 1000);
            $newTrain->number_of_coaches = $faker->numberBetween(5, 15);
            $newTrain->is_on_time = $faker->numberBetween(0, 1);
            $newTrain->is_cancelled = $faker->numberBetween(0, 1);

            $newTrain->save();
        }
    }
}
