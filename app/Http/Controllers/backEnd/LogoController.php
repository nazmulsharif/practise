<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Storage;
use App\Models\Logo;
use Auth;
use DB;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::all();

        return view('backEnd.admin.pages.logo.index',compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backEnd.admin.pages.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name'=>'nullable',
            'image'=>'required|image'
       ]);
      $originalPath = public_path('profile_images');
      $image_name = $request->file('image')->getClientOriginalName();
      $img = Image::make(request()->file('image'))->resize(300, 200)->save( $originalPath.time(). $image_name);;
      $logo = new Logo;
      $logo->image = time().$image_name;
      $logo->user_id = Auth::user()->id;
      $logo->save();
      return back()->with('success','Logo is added successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function statusChange(Request $request, $id){
        DB::table('logos')
                ->update(['status' => false]);
        $logo = Logo::find($id);
        $status = $request->status;
        if($status){
            $logo->status = 0;
        }
        else{
             $logo->status = 1;
        }
        $logo->save();
        return back();
        
    }
}
