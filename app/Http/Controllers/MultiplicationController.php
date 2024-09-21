<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use  Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;

class MultiplicationController extends Controller
{

public function getMultiplication(Request $request){

    $multiply=$request->num1 * $request->num2;

    return View::make('multiplication',['multiply'=>$multiply]);
}
}
