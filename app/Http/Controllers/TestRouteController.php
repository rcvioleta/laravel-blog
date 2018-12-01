<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class TestRouteController extends Controller
{
    public function index()
    {
        return dd(User::find(3)->profile->avatar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation = $request->validate([
           'username' => 'required',
           'password' => 'required'
       ]);

       if ($validation->fails()) 
       {
            return redirect()->route('test.index')->withErrors()->withInput();
       } 
    }
}
