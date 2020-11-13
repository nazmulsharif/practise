<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Storage;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        if(Auth::user()->user_type == "admin"){
            $users = User::where('user_type','user')->get();
            return view('backEnd.admin.pages.user.index')->with('users', $users);
        }
        else{
            return back();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backEnd.admin.pages.user.add');
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
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'gender'=>'nullable',
            'image'=>'image'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->user_type = "user";
        if($request->hasFile('image')){
            $image = $request->image->store('public/user/images');
            $user->image = $image;
        }
        $user->save();
        return redirect()->route('user.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backEnd.admin.pages.user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {      
        $editData = User::find($id);
         return view('backEnd.admin.pages.user.add', compact('editData'));
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
        $request->validate([
            'name'=>'required',
            'gender'=>'nullable',
            'email'=>'required'
        ]);
        $new_email = $request->email;
        $old_email = $request->old_email;
        if($new_email == $old_email){
            $email = $new_email;
        }
        else{
            $user = User::where('email',$new_email)->first();
            if(!empty($user)){
                $request->validate([         
                    'email'=>'unique:users'
                ]);
            }
            else{
                  $email = $new_email;
            }
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $new_email;
        $user->gender = $request->gender;
        $user->user_type = "user";
        if($request->hasFile('image')){
            $image = $request->image->store('public/user/images');
            $user->image = $image;
            if($request->old_image !=null){
                 unlink('.'.Storage::url($request->old_image));
            }
           
        }
        else
             $user->image = $request->old_image;
        $user->save();
       
        return redirect()->route('user.manage');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
    public function changePassword($id){
        $user = User::find($id);
        return view('backEnd.admin.pages.user.password.edit', compact('user'));
    }
    public function updatePassword(Request $request, $id){

         $request->validate([
            'old_password'=>'required',
            'password'=>'required|min:6|confirmed',
            
        ]);
       $user = User::find($id);
       if (Hash::check($request->password, $user->password)) {
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            return back();
       }
       else{
          $request->validate([
            'old_password.required'=>'Old Password does not match'


          ]);

       }

        
    }
}
