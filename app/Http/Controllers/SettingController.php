<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
	public function profile()
	{
		return view('settings.profile');
	}

	public function editProfile()
	{
		return view('settings.edit-profile');
	}

	public function updateProfile(Request $request)
	{
		$user = Auth::user();

		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|unique:users,email,' . $user->id,
		]);

		$user->name = $request->get('name');
		$user->email = $request->get('email');

		$user->save();

		Session::flash("flash_notification", [
			"level" => "success",
			"icon" => "fa fa-check",
			"message" => "Profile berhasil diubah"
		]);
		return redirect('admin/settings/profile');
	}
}
