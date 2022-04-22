<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return view('pages/frontend/index');
    }
}
