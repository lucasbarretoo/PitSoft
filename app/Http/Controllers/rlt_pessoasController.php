<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rlt_pessoasController extends Controller
{

    public function index(){
    
        return view('home.home');
    }
}
