<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
    //    if($request->user()->authorizeRoles(['admin'])){
            $users = User::all();
         //   return view('home', ['users' => $users]); 
        // }
         return view('home', ['users' => $users]);
        // return view('home');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //dd($request->session()->get('connectionId'));
    }
}
