<?php

namespace App\Http\Controllers\admin\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('admin.user.user-index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.user-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $is_user="user";
        $user=new User;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->role=$is_user;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.user.user-index')->with(['success' => 'کاربر  جدید با موفقیت ایجاد شد']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        // dd($user);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $is_user="user";
        $user = User::find($id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->save();

        return redirect()->route('admin.user.user-index')->with(['success' => 'اطلاعات کاربر با موفقیت ویرایش شد']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.user.user-index')->with(['success' => 'کاربر مورد نظر با موفقیت حذف شد']);
    }

    public function changeStatus(string $id)
    {
        $user=User::find($id);
        if ($user->role=='admin') 
        {
            $user->role='user';
            $user->save();
            return redirect()->back();
        }
        if ($user->role=='user') 
        {
            $user->role='admin';
            $user->save();
            return redirect()->back();
        }
    }
}
