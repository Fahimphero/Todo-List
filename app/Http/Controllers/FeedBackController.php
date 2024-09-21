<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use  Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;

class FeedBackController extends Controller
{

public function getFeedback(Request $request){

//    if($request->isMethod('POST')){
//        dd($request->all());
//    }
    $name=$request->input('Name');
    $email=$request->input('Email');
    $phone=$request->input('Phone');
    $satisfaction=$request->input('Satisfaction');
    return View::make('homepage',[ 'Name'=>$name, 'Email'=>$email,'Phone'=>$phone,'Email'=>$email,'Satisfaction'=>$satisfaction]);
}
}
