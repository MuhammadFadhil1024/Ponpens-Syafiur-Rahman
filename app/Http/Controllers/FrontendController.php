<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::all();
        return view('pages.frontend.index', compact('banners'));
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

    public function detailartikel(Request $request)
    {
        return view('pages.frontend.detailartikel');
    }

    public function detailevent(Request $request)
    {
        return view('pages.frontend.detailevent');
    }

    public function detaildivisi(Request $request)
    {
        return view('pages.frontend.detaildivisi');
    }
}
