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


        $trainFile = fopen( __DIR__ . '/../trains.csv', 'r');

        $trainFileCSV = fgetcsv($trainFile);
        $trainFileCSV = fgetcsv($trainFile);
        
        
        while($trainFileCSV != false) {
            $newTrain = new Train();

            $newTrain->company = $trainFileCSV[0];
            $newTrain->departure_station = $trainFileCSV[1];
            $newTrain->arrival_station = $trainFileCSV[2];
            $newTrain->departure_time = $trainFileCSV[3];
            $newTrain->arrival_time = $trainFileCSV[4];
            $newTrain->train_code = $trainFileCSV[5];
            $newTrain->number_of_coaches = $trainFileCSV[6];
            $newTrain->is_on_time = $trainFileCSV[7];
            $newTrain->is_cancelled = $trainFileCSV[8];

            $newTrain->save();

            $trainFileCSV = fgetcsv($trainFile);
        }



        // for($i = 0; $i < 20; $i++) {
        //     $newTrain = new Train();


        //     $newTrain->company = $faker->word();
        //     $newTrain->departure_station = $faker->city();
        //     $newTrain->arrival_station = $faker->city();
        //     $newTrain->departure_time = $faker->dateTimeInInterval('-1 week', '+1 month');
        //     $newTrain->arrival_time = $faker->dateTimeInInterval($newTrain->departure_time, '+1 month');
        //     $newTrain->train_code = $faker->numberBetween(1, 1000);
        //     $newTrain->number_of_coaches = $faker->numberBetween(5, 15);
        //     $newTrain->is_on_time = $faker->numberBetween(0, 1);
        //     $newTrain->is_cancelled = $faker->numberBetween(0, 1);

        //     $newTrain->save();
        // }
    }
}
