<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.frontend.index');
    }

    public function profil(Request $request)
    {
        return view('pages.frontend.profil');
    }

    public function event(Request $request)
    {
        return view('pages.frontend.event');
    }

    public function divisi(Request $request)
    {
        return view('pages.frontend.divisi');
    }

    public function artikel(Request $request)
    {
        return view('pages.frontend.artikel');
    }
}
