<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUsers(){
        $users = DB::table('users')->get();  //fetch data
        //return $users;
        
        return view('allusers',['data' => $users]);  //(fetch data passed to view)
        // foreach($users as $user){
        //     echo $user->name . "<br>";  shows all data but with name as mention
        // }     (data shown in within controller file that we dont need to do instead we have to pass the data to view)
    }
// to fetch single data on other file but in same format
   
    public function singleUser(string $id){
        $users = DB::table('users')->where('id',$id)->get();
        return view('userdet', ['data' => $users]);  //returning view data
        // return $users;  for showing all data via allusers file
    }
// to add some new records (crud operation in laravel)
    public function addUser(Request $req){
        $req->validate([
            'username' => 'required',
            'useremail' => 'required|email',
            'userage' => 'required|numeric',
            'usercity' => 'required'
        ]);

        return $req->all();
        // $users = DB::table('users')
        //             ->insert([
        //                 [
        //                     'name' => $req->username,
        //                     'email' => $req->useremail,
        //                     'age' => $req->userage,
        //                     'city' => $req->usercity,
        //                     'created_at' => now(),
        //                     'updated_at' => now()
        //                 ]
                        
        //             ]);
        //dd($users)   to show whether passed data is saved or not
        if($users){
            return redirect()->route('used');
        }
        //     echo "<h1>Data Successfully Added";
        // }else{
        //     echo "<h1>Data Not Added";
        }
    
    public function updatepage(string $id){
        //$users = DB::table('users')->where('id', $id)->get();
        $users = DB::table('users')->find($id);
        //return $users;
        return view('updateuser', ['data' => $users]);
    }



    public function updateUser(Request $req, $id){
        $users = DB::table('users')
                    ->where('id',$id)
                    ->update([
                        'name' => $req->username,
                        'email' => $req->useremail,
                        'age' => $req->userage,
                        'city' => $req->usercity,
                        'created_at' => now(),
                        'updated_at' => now()
                ]);
                if($users){
                    return redirect()->route('used'); 
                    //echo "<h1>Data Successfully Updated";
            }
        }
    
    

    public function deleteUser(string $id){
        $users = DB::table('users')
                    ->where('id',$id)
                    ->delete();
            if($users){
                return redirect()->route('used');    //to return on the all usewrs liat page
                //echo "<h1> Data Successfully Deleted</h1>";
            }
    }
}
