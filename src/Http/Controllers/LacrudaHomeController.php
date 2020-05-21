<?php

namespace RealSoft\Lacruda\Http\Controllers;

use App\Http\Controllers\Controller;

class LacrudaHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('lacruda::auth.home');
    }
}
