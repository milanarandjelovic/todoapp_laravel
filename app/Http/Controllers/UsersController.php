<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class UsersController extends Controller
{

	public function edit()
	{
		$user = Auth::user();

		return view('users.edit')->with('user', $user);
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'first_name' => 'required|min:3|alpha',
			'last_name'  => 'required|min:5|alpha',
			'email'      => 'required|email|max:255',
			'password'   => 'min:6|max:255',
		]);

		if ($validator->fails()) {
			return redirect()
				->route('user.profile')
				->withErrors($validator)
				->withInput(); // withInput()  return old input
		}

		$id = Auth::user()->id;
		$user = User::all()->where('id', $id)->first();
		$user->first_name = $request->input('first_name');
		$user->last_name = $request->input('last_name');
		$user->username = $request->input('username');
		$user->email = $request->input('email');
		if (! $user->password) {
			$user->password = bcrypt($request->input('password'));
		}
		$user->save();

		return redirect()
			->route('user.profile')
			->with('success', 'Profile update');
	}
}
