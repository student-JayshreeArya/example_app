<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showUser(){

        //return "<h1>Welcome</h1>";
         return view('happy');
    }

    public function showHome(string $id){
        return view('home', ['id' => $id]);
    }
}
