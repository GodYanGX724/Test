<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Search', function () {
    return view('/Search',['result' =>null]);
});

Route::post('/Search',function(Request $request){
        $id = $request->id;
        // $users = DB::select('select * from userinfo ');
        if($id == null){
            $users = DB::select('select * from userinfo ');
        }else{
            $users = DB::select('select * from userinfo where uid = ?', [$id]);
        }
        

        foreach ($users as $user) {
            $result[] = $user->cname;
        }
        $output = implode( $result);
        
        // print("{$result}<br>");
        // $cname = $users->cname;
        return view('/Search',['result'=>$output,'id'=>$id]);

});