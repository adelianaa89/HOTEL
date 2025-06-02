<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
}
