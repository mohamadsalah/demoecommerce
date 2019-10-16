<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\imaget;
use App\User;
use App\Requests\FormRequest;
use App\Http\Requests\updateProfile;
use Image;
use Auth;
use Validator;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class profileController extends Controller
{
    

       public function __construct(){

        $this->middleware('auth')->except([ 'show']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
     
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
        $user=User::find($id);
        if($user)
          {
             $products=$user->product()->withTrashed()->get();
          
              return view ('profile',['user' => $user,'products' => $products]); 
          }
        else
          return back();
 
    

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
    public function update(updateProfile $request, $id)
    {
      $user=User::find($id);
      if($request->name)
      $user->name=$request->name;
       if($request->phone)
      $user->phone=$request->phone;
       if($request->password)
      $user->passowrd=$request->password;
       if($request->location)
      $user->location=$request->location;

      $user->save();
      return back();
      
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


     public function updateAvatar(Request $request)
    {
        if ($request->hasFile('profile_picture'))
        {
                $validation = Validator::make($request->all(), ['profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
                 if($validation->passes())
                 {
                      $profile_picture=$request->file('profile_picture');
                      $path=public_path().'/images/avatars/'.Auth::user()->id.'/';
                      if(!File::exists($path)) {File::makeDirectory($path, 0777, true, true);}
                      $avatarName=time().$profile_picture->getClientOriginalName();
                      $profile_picture->move($path,$avatarName );
                      $user=User::find(Auth::user()->id);
                      $publicPath='http://127.0.0.1:8000/images/avatars/'.Auth::user()->id.'/'.$avatarName;
                      $user->profile_picture=$publicPath;
                      $user->save();
                      return response()->json(['success'=>$publicPath]);
                  }
        }
        
        else{
             return response()->json(['success'=>'Got Simple Ajax Request wrong']);
        }


      // if ($request->hasFile('profilepicture'))
      //   {


      //   $profpic=$request->file('profilepicture');

      //   $filename=time().'.'.$profpic->getClientOriginalExtension();
       
      //   Image::make($profpic)->resize(250,250)->save(public_path($filename));
      //   $user= Auth::user();
      //   $user->profilepicture=$filename;
      //   $user->save();



      //   }
      //   else{ dd("not");}
      //   return redirect('profile');

    }
}
