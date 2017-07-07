<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions/login');
	}

	public function store() 
	{
		if (! auth()->attempt(request(['email', 'password']))) {
			return redirect()->route('login')->with('errors');
		}

		return redirect()->route('index');
	}

    public function destroy() 
    {
    	auth()->logout();

    	return redirect()->route('index');
    }
}

