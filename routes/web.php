<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;
use App\Models\Customer;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitizenController;


// Route::get('/happy', function(){
//     return view('happy');
// });

// Route::get('/happy', [PageController::class, 'showUser']);

//named route
// Route::get('/', function() {
//     return view('welcome');
// })->name('home');

// Route::get('/post', function(){
//     return view('hello');
// });

// Route::get('/learn', function() {
//     return view('about');
// })->name('happy');



// Route::get('/hello/{id}', function(string $id) {
//     return 'User : '.$id;
// });




// Route::get('/hello/{id?}/comment/{comment?}', function(string $id = null, string $comment = null) {
//     if($id){
//         return "<h1>User : ".$id ."</h1><h2>Comment : ".$comment ."</h2>";
//     }
//     else{
//         return "<h1>User Not Found</h1>";
//     }
// });

// Route::get('hello/{id}', function(string $id) {
//     return 'User : '. $id;
// })->whereNumber('id');




// //route groups
// Route::prefix('page')->group(function() {
//     Route::get('/about', function() {
//         return "<h1>My ABOUT page</h1>";
//     });

//     Route::get('/gallery', function() {
//         return "</h1>My GALLERY page</h1>";
//     });

//     Route::get('/post/firstpost', function() {
//         return "<h1>My first POST page</h1>";
//     });
// });


// //fallback func
// Route::fallback(function() {
//     return "<h1>Page Not Found.</h1>";
// });

//blade engine
Route::get('/', function() {
    return view('welcome');
});


Route::get('/hello', function() {
    return view('hello');
});

Route::get('/test', function() {
    return view('test');
});


Route::get('/about', function() {
    return view('about');
});


// ways to pass data from route to viewa
function getUser(){
    return [
        1 => ['name' => 'Amitabh', 'phone' => 7894724772, 'city' => 'Gurgaon'],
        2 => ['name' => 'Gagan', 'phone' => 7962642892, 'city' => 'Hyderabad'],
        3 => ['name' => 'Neha', 'phone' => 8356466549, 'city' => 'Raipur'],
        4 => ['name' => 'Jaya', 'phone' => 6772459424, 'city' => 'Gwalior'],
        5 => ['name' => 'Abhay', 'phone' => 7635829787, 'city' => 'Jodhpur'],
    ];
}


    //$name = "Happy Birthday";
    // $names = [
    //     1 => ['name' => 'Amitabh', 'phone' => 7894724772, 'city' => 'Gurgaon'],
    //     2 => ['name' => 'Gagan', 'phone' => 7962642892, 'city' => 'Hyderabad'],
    //     3 => ['name' => 'Neha', 'phone' => 8356466549, 'city' => 'Raipur'],
    // ];
    Route::get('/user', function() {

    
    $names = getUser();

    return view('user', [
        'user' => $names,
        'city' => 'Delhi'
    ]);

    });

//     return view('user', ['user' => $name, 'city' => 'Delhi']);
// });

// return view('user')->with('user', $name)->with('city', 'Delhi');
// });

//return view('user')->withUser($name)->withCity('Delhi');


Route::get('/user/{id}', function($id) {
    $user = getUser();
    abort_if(!isset($user[$id]), 404);
    $use = $user[$id];

    return view('use', ['id' => $use]);
   // return "<h1>User : " . $id . "</h1>";
})->name('view.user');



Route::get('/happy', function(){
    return view('happy');
});

Route::get('/happy', [PageController::class, 'showUser'])->name('user');
Route::get('/home/{id}', [PageController::class, 'showHome'])->name('home');

// Route::get('/tester', TestController::class);

Route::get('/customer',function(){
    $customers = Customer::all();
    echo "<pre>";
    print_r($customers->toArray());
});


Route::controller(UserController::class)->group(function(){
    Route::get('/used', 'showUsers')->name('used');
    Route::get('/single/{id}', 'singleUser')->name ('view.user');
    Route::post('/add', 'addUser')->name('addUser');
    Route::post('/update/{id}', 'updateUser')->name('update.user');
    Route::get('/updatepage/{id}', 'updatePage')->name('update.page');
    Route::get('/delete/{id}', 'deleteUser')->name('delete.user');
});

Route::view('newuser', '/adduser');

Route::get('/citizen',[CitizenController::class,'showCitizens']);

Route::get('/union',[CitizenController::class,'uniondata']);

Route::get('/when',[CitizenController::class,'whendata']);

Route::get('/chunk',[CitizenController::class,'chunkdata']);