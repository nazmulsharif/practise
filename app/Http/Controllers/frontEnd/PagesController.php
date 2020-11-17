<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use DB;
use App\Models\Slider;
class PagesController extends Controller
{
  
    public function index(){
        $sliders = Slider::where([
            'status'=> 1,

        ])->orderBy('priority','asc')->get();
      
    	return view('frontEnd.pages.home', compact('sliders'));
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
