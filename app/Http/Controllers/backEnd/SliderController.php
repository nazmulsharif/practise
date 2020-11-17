<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
use Storage;
class SliderController extends Controller
{
	public function index(){
		$sliders = Slider::all();
		return view('backEnd.admin.pages.slider.index',compact('sliders'));
	}
    public function create(){
    	return view('backEnd.admin.pages.slider.create');
    }
    public function edit($id){
       $editData = Slider::find($id);
        return view('backEnd.admin.pages.slider.create', compact('editData'));
    }
    public function store(Request $request){
    	$request->validate([
    		'title'=>'nullable',
    		'image'=>'required|image',
    		'text'=>'nullable',
            'priority'=>'required|unique:sliders'
    	]);
    	$slider = new Slider();
    	$slider->title = $request->title;
    	$slider->slider_text = $request->text;
    	$slider->user_id = Auth::user()->id;
        $slider->priority = $request->priority;
        $slider->button_url = $request->button_url;
    	if($request->hasFile('image')){
    		$img = $request->image->store('public/backEnd/slider_images');
    		$slider->image = $img;
    	}
    	$slider->save();
    	return back()->with('success', 'slider is added successfully');
    }
     public function statusChange(Request $request, $id){
        $slider = Slider::find($id);
        $status = $request->status;
        if($status){
            $slider->status = 0;
        }
        else{
             $slider->status = 1;
        }
        $slider->save();
        return back();
       
    }
    public function destroy($id){
        $slider = Slider::find($id);
        
       $slider->delete();
       return back();
    }
    public function trash(){
        $sliders = Slider::onlyTrashed()
               
                ->get();
        return view('backEnd.admin.pages.slider.trash', compact('sliders'));
    }
    public function restore($id){
      
       Slider::withTrashed()->where('id',$id)->restore();
       return back();
    }
    public function update(Request $request, $id){
       $request->validate([
            'title'=>'nullable',
            'image'=>'required|image',
            'text'=>'nullable',
           
        ]);
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->slider_text = $request->text;
        $slider->user_id = Auth::user()->id;
        $slider->priority = $request->priority;
        $slider->button_url = $request->button_url;
        if($request->hasFile('image')){
            $img = $request->image->store('public/backEnd/slider_images');
            unlink('.'.Storage::url($slider->image));
            $slider->image = $img;
        }
        $slider->save();
        return back()->with('success', 'slider is added successfully');
    }
}
