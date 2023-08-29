<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('blogs.index',[
            'blogs' => $user->blogs()->paginate(3)
        ]);
    }

    public function profile(User $user)
    {
        return view('users.profile', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $formData = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', Rule::unique('users', 'email')->ignore($user->id)]
        ]);

        $formData['avatar'] = request()->file('avatar') ? request()->file('avatar')->store('avatar') : $user->avatar;
        $user->update($formData);

        return redirect("/$user->username/profile");
    }
}
