<?php

namespace App\Http\Controllers;
use App\Http\Requests\MyRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{
    // function __invoke(MyRequest $request){
    //     $uid = $request->uid;
    //     print($uid);
    // }

    function __invoke(Request $request){
        if($request->hasFile('photo')){
            $photo = $request->photo;
            // $photo->store('documents');
            $photo->storeAs('documents',$photo->hashName());
            print($photo->getClientOriginalName());
        }else{
            print('no file upload');

        }
            
        
    }
}
