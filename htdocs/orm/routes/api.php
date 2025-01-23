<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\userinfo;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/userinfo", function () {
    // foreach(userinfo::where("uid","A01")->get() as $user){
    //     print($user->cname);
    // }
    $users = userinfo::where("uid","like","A%")->get();
    $json = $users->toJson(JSON_UNESCAPED_UNICODE);
    return response($json)
        ->header('content-type' ,'application/json');
});

Route::post('/update', function(Request $request){
    $uid = $request->uid;
    $old = $request->old;
    $new = $request->new;
    $user = userinfo::find( $uid );

    if(isset($user)){
        if($old == $user->password){
            $user->password = $new;
            $user->save();
            return response('{"ok":"1"}')
            ->header('content-type' ,'application/json');
        }
    }

});

Route::post('/login', function(Request $request){
    $uid = $request->uid;
    $password = $request->password;
    $user = userinfo::find( $uid );

    if(isset($user)){
        if($password == $user->password){
            return response('{"status":"login"}')
            ->header('content-type','application/json');
        }
    }
});