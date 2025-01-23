<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyModel;
class ComputeController extends Controller
{
    private $model;
    function __construct(){
        $this->model = new MyModel();
    }
    function __invoke(Request $request) {
        $a = $request->a * 10;
        $b = $request->b;
        $result = $this->model->add( $a, $b );
        return view("compute")
        ->with("a", $a)
        ->with("b", $b)
        ->with("result", $result);
    }
}
