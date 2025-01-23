<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\userinfo;
use App\Models\house;

Route::view("/form", 'form');

Route::post('/form',FormController::class);

Route::get('/myerror', function() {
    return "ERROR";});

Route::get("/photo", function() {
    $filename= 'documents/98ItXhsxZ1XXwfIiHyUOAVVhROYQe5SJTPuHL0g9.webp';
    $mineType = Storage::mimeType($filename);
    $data = Storage::get($filename);
    return response($data)->header('content-type','image/webp');
});








Route::get("/bill", function () {
    $house = house::find(1);
    $sum = 0;
    foreach($house->bills as $bill) {
        print($bill->fee . "<br>");
        $sum += $bill->fee;
    }

    print("總計: {$sum}");
});



Route::get("/userinfo", function () {
    // foreach(userinfo::where("uid","A01")->get() as $user){
    //     print($user->cname);
    // }
    $users = userinfo::where("uid","A01")->get();
    foreach ($users as $user) {
        print($user->cname ."<br>");
        $lives = $user->lives;
        foreach ($lives as $house) {
            
            // foreach($house->own as $phone)
            // print($house->address . $phone->tel ."<br>");
            if ($house->own->isNotEmpty()) {
                foreach ($house->own as $phone) {
                    print($house->address . " - " . $phone->tel . "<br>");
                }
            } else {
                print($house->address . "<br>");
            }
        }
    }
});

Route::get("/live", function () {
    $user = userinfo::find("A01");
    $house = house::find(4);

    $user->lives()->save($house);
    print("ok");

});


Route::get("/insert", function () {
    $user = new userinfo;
    $user->uid = "A08";
    $user->cname = "陳小梅";
    $user->save();
    print("OK");
});

Route::get("/update", function () {
    $user = userinfo::find('A08');
    $user->cname = "陳美美";
    $user->save();
    print("OK");
});

Route::get("/delete", function () {
    $user = userinfo::find("A08");
    $user->delete();
});

Route::get('/', function () {
    $users = DB::table('userinfo')
        ->leftJoin('live','userinfo.uid','=','live.uid')
        ->leftJoin('house','live.hid','=','house.hid')
        ->where('userinfo.uid',"A06")
        ->orderBy('userinfo.uid','desc')
        ->get()
        // ->dd()
        ->dump();
    print("<pre>");
    print_r($users);
    print("</pre>");
    // foreach ($users as $user) {
    //     print($user->cname."<br>");
    // }
});
