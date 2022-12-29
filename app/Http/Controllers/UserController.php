<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index()
    {
        # Controller === View 
        return  view('/home');
       
    }
}
