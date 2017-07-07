<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
	public function create() 
	{
		return view('sessions/registration');
	}

	public function store(Request $request)
	{

		$this->validate(request(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed'
		]);

		$user = User::create([
			'name' => request()->input('name'),
			'email' => request()->input('email'),
			'password' => bcrypt(request()->input('password'))
		]);

		auth()->login($user);

		return redirect()->route('index');
	}
}
