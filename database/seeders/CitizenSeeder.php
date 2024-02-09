<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Citizen;
use Illuminate\Support\Facades\File;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/citizen.json');
        $citizens = collect(json_decode($json));
        // $citizens = collect(
        //     [
        //         [
        //             'name' => 'Gayartri Mishra',
        //             'email' => 'gayatri@gmail.com',
        //             'age' => 34,
        //             'city' => 1,
        //         ],
        //         [
        //             'name' => 'Jagrati Mishra',
        //             'email' => 'jagrati@gmail.com',
        //             'age' => 24,
        //             'city' => 1,
        //         ]
        //     ]
        // );

        $citizens->each(function($citizen){
            citizen::create([
            'name' => $citizen->name,
            'email' => $citizen->email,
            'age' => $citizen->age,
            'city' => $citizen->city
        ]);
    });

        // citizen::create([
        //     'name' => 'Gayartri Mishra',
        //     'email' => 'gayatri@gmail.com',
        //     'age' => 34,
        //     'city' => 1,
        // ]);
    }
}
