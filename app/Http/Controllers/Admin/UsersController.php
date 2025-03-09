<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Users\StoreRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    //

    public function all()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.add');
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        $createdUser = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'role' => $validatedData['role'],
        ]);

        if (!$createdUser) {
            return back()->with('failed', 'کاربر ایجاد نشد!');
        }

        return back()->with('success', 'کاربر ایجاد شد');
    }

    public function edit($userID)
    {
        $user = User::findOrFail(id: $userID);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateRequest $request, $user_id)
    {
        $validatedData = $request->validated();

        // return dd($validatedData);

        $user = User::findOrFail($user_id);

        $updatedUser = $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'role' => $validatedData['role'],
        ]);

        if (!$updatedUser) {
            return back()->with('failed', 'کاربر آپدیت نشد!');
        }

        return back()->with('success', 'کاربر آپدیت شد');
    }

    public function delete($userID)
    {
        $user = User::findOrFail($userID);

        $user->delete();

        return back()->with('success', 'کاربر با موفقیت حذف شد');
    }
}
