<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('view',auth()->user());
        return view('admin.users.index',['users'=>User::paginate(5)]);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.users.profile',['roles'=>Role::all()]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //         $request->validate([
        // "username"=>'required|unique::users',"fullname"=>'required','email'=>'required|unique'
        //         ]);
        $this->authorize('update', auth()->user());
$user=User::find($id);

    $user->name=$request->get('fullname');
  //  $user->username=$request->get('username');
    $user->email=$request->get('email');
    if($request->has('password') && $request->has('newpassword') && $request->has('confirmpassword')){
    }
            if(Hash::check($request->get('password'),$user->password)){
                if( $request->get('newpassword') === $request->get('confirmpassword')){
                     $user->password=$request->get('newpassword');
                }else{
                    return back();
                }

            }else{
                return back();

        }



        $user->save();
return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function delete($user_id){
        $this->authorize('delete', auth()->user());
        User::find($user_id)->delete();
        return back();

    }
    public function attach(Request $request,$id){
$request->user()->roles()->attach($id);
return back();
    }
    public function detach(Request $request, $id)
    {
        $request->user()->roles()->detach($id);
        return back();
    }
    // public function userRoleDelete(Request $request, $id){

    //     return back();
    // }
}
