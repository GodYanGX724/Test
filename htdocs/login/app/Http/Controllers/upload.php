<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class upload extends Controller
{
    function __invoke(Request $request){
        if($request->hasFile('photo')){
            $photo = $request->photo;
            
            $photo->storeAs(auth()->id(),$photo->hashName());
            print($photo->getClientOriginalName());
        }else{
            print('no file upload');

        }
            
        
    }
}


