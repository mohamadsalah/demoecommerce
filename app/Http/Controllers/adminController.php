<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\product;
use App\User;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pnded=product::where('approve','=',false)->get();
       $sold=product::onlyTrashed()->get();
       $users=User::get();
       $blockedUsers=User::onlyTrashed()->get();
       $reported=product::where('report','>',0)->get();

       // return view('admin',['sold'=>$sold ,'blockedUsers'=>$blockedUsers ,'reported'=>$reported ,'users'=>$users ,'pnded'=> $pnded]);
       return view('admin')->withpended($pnded)->withsold($sold)->withblockedUsers($blockedUsers)->withreported($reported)->withusers($users);


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
    //approve product from user
     public function approve($id)
    {
        $product=product::find($id);
        if($product)
        {
                        $product->approve=true;
                        $product->save();
                        $success='product have been approved now ';
                        session(['success'=>$success]);
                        return back();
        }
        else
        {
                        $fail='no products found ';
                        session(['fail'=>$fail]);
                        return back();

        }
    }

    //pin user
    public function pinUser($id)
    {
       $user =User::find($id);
        if($user){
                User::destroy($id);
                $success='user have been pinned now ';
                session(['success'=>$success]);
                return back();
                       }
        else
        {
        $fail='no users found ';
        session(['fail'=>$fail]);
        return back();

        }

    }
 public function unpinUser($id)
    {
       $user =User::find($id);
        if($user)
        {
                    $user->restore();
                    $success='user have been activated again ';
                    session(['success'=>$success]);
                    return back();
              }
        else
        {
            $fail='no users found ';
            session(['fail'=>$fail]);
            return back();

        }

    }


    //make user as admin 
     public function makeAdmin($id)
    {
        $user=User::find($id);
        if ($user) {
            $user->isAdmin=1;
            $user->save();
            $success='user is admin now ';
            session(['success'=>$success]);
            return back();
        }
        else{
            $fail='user not found';
             session(['fail'=>$fail]);
            return back();

        
    }
        }
}
