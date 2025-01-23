<?php
namespace App\Http\Controllers;

use App\Http\Middleware\CheckNumber;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/query/{uid?}', function ($uid = 1) {
    $users = DB::select('select * from userinfo where uid = ? or ?', [$uid,$uid]);
    $result = '';
    // foreach ($users as $user) {
    //     print($user->cname . '<br>');
    // }
    return view('result')->with('users', $users);
});

Route::get('/querynew/{uid}', function ($uid) {
    $cname = DB::scalar('select cname from userinfo where uid = ?', [$uid]);
    print($cname);
});

Route::get('/update/{uid}/{cname}', function ($uid,$cname) {
    DB::update('update userinfo set cname = ? where uid = ?',[$cname,$uid]);
    return redirect('/querynew/' . $uid);
});




Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name?}', function ($name = 'world') {
    
    return "Hello {$name}";
});


Route::get("/print", function () {
    print("hi");
    
    });

Route::get("/{method}/{num1}/{num2}", function ($method,$num1,$num2) {
    
    switch ($method) {
        case "add":
            return $num1 + $num2;
        case "sub":
            return $num1 - $num2;
        case "times":   
            return $num1 * $num2;
        case "div":
            return $num1 / $num2;    
        }
    });



// Route::get("/compute", function () {
//     return view("compute")
//         ->with("a","")
//         ->with("b","");

// });
Route::view("/compute","compute", ["a"=> "","b"=> "","result"=> ""]);


Route::post("/compute", [ComputeController::class, '__invoke'])
    ->middleware(CheckNumber::class);