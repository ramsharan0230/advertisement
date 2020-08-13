<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'DESC')->get();
        return view('home')->with(['users'=>$users]);
    }
}
