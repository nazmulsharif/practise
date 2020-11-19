<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\RecentWorksCategory;
use Illuminate\Http\Request;
use App\Models\Logo;
use DB;
use App\Models\Slider;
use App\Models\AboutSection;
use App\Models\RecentWorks;
class PagesController extends Controller
{

    public function index(){
        $sliders = Slider::where([
            'status'=> 1,

        ])->orderBy('priority','asc')->get();
        $categories = RecentWorksCategory::all();
        $aboutSections = AboutSection::all();
        $recentWorks = RecentWorks::all();

    	return view('frontEnd.pages.home', compact('sliders','recentWorks', 'categories','aboutSections'));
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
