<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	return view('frontEnd.pages.home');
    }
    public function about(){
    	return view('frontEnd.pages.about');
    }
    public function services(){
    	return view('frontEnd.pages.services');
    }
    public function blog(){
    	return view('frontEnd.pages.blog');
    }
    public function contact(){
    	return view('frontEnd.pages.contact');
    }
}
