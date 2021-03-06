<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('admin.index', compact('users'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
