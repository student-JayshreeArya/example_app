<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Citie;
use Illuminate\Support\Facades\File;

class CitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/citie.json');
        $cities = collect(json_decode($json));

        $cities->each(function($citie){
            citie::create([    //for working with json used command json
                'id' => $citie->id,
                'city_name' => $citie->city_name
            ]);
        });
        // Citie::create([
        //     'id' => 1,
        //     'city_name' => 'Gwalior',
        // ]);
    }
}
