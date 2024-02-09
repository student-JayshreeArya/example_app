<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\employee;
use Illuminate\Support\Facades\File;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/employees.json');
        $employees = json_decode($json);   //json_decode conver json into array
        
        $employees->each(function($employees){
            employee::insert($employees);
        });
        // $employees = collect(
        //     [
        //         [
        //             'name' => 'Kavita Singh',
        //             'email' => 'kavita@gmail.com' 
        //         ],
        //         [
        //             'name' => 'Juli Sharnma',
        //             'email' => 'juli@gmail.com'
        //         ],
        //         [
        //             'name' => 'Lily Goyal',
        //             'email' => 'lily@gmail.com'
        //         ],
        //         [
        //             'name' => 'Kapil Verma',
        //             'email' => 'kapil@gmail.com'
        //         ]
        //     ]
        // );

        

    //     employee::create([
    //         'name' => 'Kavita Singh',
    //         'email' => 'kavita@gmail.com'
    //     ]);
    }
}
