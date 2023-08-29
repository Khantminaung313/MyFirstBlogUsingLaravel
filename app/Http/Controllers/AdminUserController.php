<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.usersManage', [
            'users' => User::paginate(6)->sortBy(['username', 'asc'])
        ]);
    }

    public function destroy(User $user)
    {
        $user->destroy($user->id);

        return back();
    }
}
