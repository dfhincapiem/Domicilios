<?php

namespace Domicilios\Http\Controllers;

use Illuminate\Http\Request;

use Domicilios\User;
use Domicilios\Role;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
          //    if($request->user()->authorizeRoles(['admin'])){
            $users = User::all();
            //   return view('home', ['users' => $users]); 
           // }
            return view('home', ['users' => $users]);
           // return view('home');
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
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
       
        ]);
        
        //$role_user->save();
        $role_user  = Role::where("name", $request->role)->first();

        $user = new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);       
        $user->user_active=true;
        if($request->user_active!=true)
        $user->user_active=false;
        $user->save();
        $user->roles()->attach($role_user);



       
        return redirect()->action('HomeController@index');

        // return $request+'admin' ;
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

        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
       
        ]);
    
        $role_user  = Role::where("name", $request->role)->first();        
        $user = User::find($id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->user_active=true;
        if($request->user_active!=true)
        $user->user_active=false;
        $user->save();
        $user->roles()->attach($role_user);    
        $user->save();  
        return redirect()->action('HomeController@index');
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
  
        return redirect('/home');

//        return "destroy";
    }
}
