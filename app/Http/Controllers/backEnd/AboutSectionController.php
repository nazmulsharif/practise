<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;

class AboutSectionController extends Controller
{
    public function index(){
        $aboutSections = AboutSection::all();
        return view('backEnd.admin.pages.about_section.index', compact('aboutSections'));
    }

    public function create(){
        return view('backEnd.admin.pages.about_section.create');
    }
    public function store(Request $request){

        $request->validate([
            'main_title'=>'required',
            'short_title'=>'required',
            'desc'=>'required',
            'list'=>'required',
            'final_text'=>'required'
        ]);
        $list = implode('<>',$request->list);
        $aboutSection = new AboutSection();
        $aboutSection->main_title = $request->main_title;
        $aboutSection->short_title = $request->short_title;
        $aboutSection->description = $request->desc;
        $aboutSection->final_text = $request->final_text;
        $aboutSection->list = $list;
        $aboutSection->save();
        return back()->with('success','about section is added successfully');
    }
    public function edit($id){
        $aboutSection = AboutSection::find($id);
        return view('backEnd.admin.pages.about_section.edit', compact('aboutSection'));

    }
    public function update(Request $request, $id){
        $request->validate([
            'main_title'=>'required',
            'short_title'=>'required',
            'desc'=>'required',
            'list'=>'required',
            'final_text'=>'required'
        ]);
        $list = implode('<>',$request->list);
        $aboutSection = AboutSection::find($id);
        $aboutSection->main_title = $request->main_title;
        $aboutSection->short_title = $request->short_title;
        $aboutSection->description = $request->desc;
        $aboutSection->final_text = $request->final_text;
        $aboutSection->list = $list;
        $aboutSection->save();
        return back()->with('success','about section is updated successfully');
    }
}
