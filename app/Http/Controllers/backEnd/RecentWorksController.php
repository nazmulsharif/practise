<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecentWorksCategory;
use App\Models\RecentWorks;
use Auth;
class RecentWorksController extends Controller
{
    public function index(){
        $RecentWorks = RecentWorks::all();
        return view('backEnd.admin.pages.recent_works.work.index', compact('RecentWorks'));
    }
    public function create(){
        $categories =RecentWorksCategory::all();

        return view('backEnd.admin.pages.recent_works.work.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'sub_title'=>'required',
            'image'=>'required',
            'link'=>'required',
            'category_id'=>'required',

        ]);
        $recentWorks = new RecentWorks();
        $recentWorks->title = $request->title;
        $recentWorks->sub_title = $request->sub_title;
        $image = $request->image->store('public/images/recentwroks');
        $recentWorks->image = $image;
        $recentWorks->link =  $request->link;
        $recentWorks->category_id =  $request->category_id;
        $recentWorks->user_id = Auth::user()->id;
        $recentWorks->save();
        return back();
    }
}
