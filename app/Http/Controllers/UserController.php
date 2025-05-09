<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('last_login_at', 'desc')->get();

        $users = $users->map(function ($user) {
            if ($user->last_login_at) {
                $user->last_login_at_formatted = Carbon::parse($user->last_login_at)
                    ->timezone('Asia/Jakarta')
                    ->translatedFormat('d M Y H:i:s');
                $user->last_login_at_utc = $user->last_login_at->toDateTimeString();
            } else {
                $user->last_login_at_formatted = null;
                $user->last_login_at_utc = null;
            }
            return $user;
        });

        return view('admin.users.index', compact('users'));
    }
}
