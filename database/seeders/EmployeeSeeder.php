<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 100; $i++){

            DB::table('employee')->insert([
                'nama' => $faker->name,
                'id_comp' => $faker->numberBetween(1,5),
                'email' => $faker->safeEmail,
                'jk'=>$faker->randomElement(['male', 'female']),
                'alamat' => $faker->address,
            ]);
        }
    }
}
