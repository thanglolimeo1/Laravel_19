<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return 'Home page fehsfbief';
    }

    public function view(){
    	return view('welcome');
    }

    public function page($page =1){
    	return "Page $page";
    }
}