<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function cover()
    {
        $title = 'SPK WP | Welcome';

        return view('cover', compact('title'));
    }

    public function adminHome()
    {
        $adminName = auth()->user()->name;

        return view('dashboard', compact('adminName'));
    }
}
