<?php

namespace App\Http\Controllers;

use App\Models\User;
use Log;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request): void
    {
        $user = User::first();
    }
}
