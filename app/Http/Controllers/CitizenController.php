<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitizenController extends Controller
{
    public function showCitizens(){
        $citizens = DB::table('citizens')
                    ->select('citizens.*','cities.city_name')
                    //select(DB::raw('count(*)as citizen_count),'cities.city_name,)
                    ->join('cities','citizens.city','=','cities.id')
                    //where('citizens.name','like','s%') condition where we want to see data of names starting with s
                    //where('cities.city_name','=','Gwalior')  people comes from Gwalior
                    //having can be used inplace of where
                    ->get();   //shows data
                    //count() to check total num of data but get() and view() not used with this method
                    //groupBy('city_name')  details gropued by cityname
                    //orderBy('citizen_count', desc)  
                    //having('citizen_count', '>', 1)   data of cities from where more than 1 citizen came
                    //havingBetween('citizen_count',[1-3])  citizens [1-3] coming from whch city

            //return $citizens;   records shown in array
            return view('citizen',compact('citizens'));  //records shown in html pattern 
    }

    public function uniondata(){
        $lecturers = DB::table('lecturers')
                    ->select('name','email','city_name')
                    ->join('cities','lecturers.city','=','cities.id');

        $citizens = DB::table('citizens')
                    ->union($lecturers)
                    ->select('name','email','city_name')
                    ->join('cities','citizens.city','=','cities.id')
                    ->get();

                    return $citizens;
                    //return view('')
    }

    public function whendata(){
        $citizens = DB::table('citizens')
                    ->when(true,function($query){
                        $query->where('age','>', 20);
                    },function($query){
                        $query->where('age','<',20);
                    })
                    ->get();
                    return $citizens;
    }

    public function chunkdata(){
        $citizens = DB::table('citizens')->orderBy('id')
                    ->chunk(3,function($citizens){
                        echo "<div style = 'border:1px solid red;margin-bottom:15px;'>";
                            foreach($citizens as $citizen){
                                echo $citizen->name . "<br>";
                            }
                        echo "</div>";
                    });
    }
}
