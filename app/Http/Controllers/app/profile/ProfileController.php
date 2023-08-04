<?php

namespace App\Http\Controllers\app\profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('app.profile.profile');
    }

    public function update(UpdateProfileRequest $request)
    {
        $inputs = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone'=>$request->phone
        ];
        $user = auth()->user();
        $user->update($inputs);
        return redirect()->route('profile.profile')->with('success', 'حساب کاربری با موفقیت ویرایش شد');
    }
}
