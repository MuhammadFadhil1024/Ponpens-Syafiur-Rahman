<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Division;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Management;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::all();
        $managements = Management::where('position', 'PENGASUH')->limit(4)->get();
        // dd($managements);
        $articles = Article::InRandomOrder()->limit(4)->get();
        // dd($articles);
        $divisions = Division::with(['divisiongallery'])->InRandomOrder()->limit(6)->get();
        // dd($divisions);
        $news = Article::with(['user'])->InRandomOrder()->limit(6)->get();
        // dd($news);

        return view('pages.frontend.index', compact('banners', 'managements', 'articles', 'divisions', 'news'));
    }

    public function profil(Request $request)
    {
        $pengasuh = Management::where('position', 'PENGASUH')->get();

        $binkons = Management::where('position', 'BINA KONSELING')->get();

        $guru = Management::where('position', 'GURU')->get();

        return view('pages.frontend.profil', compact('pengasuh', 'binkons', 'guru'));
    }

    public function event(Request $request, $year)
    {
        $events = Event::with(['eventgallery'])->where('year', $year)->get();
        // dd($events);
        return view('pages.frontend.event', compact('events'));
    }

    public function divisi(Request $request)
    {
        $divisions = Division::with(['divisiongallery'])->get();
        // dd($divisions);

        return view('pages.frontend.divisi', compact('divisions'));
    }

    public function artikel(Request $request)
    {
        $articles = Article::all();

        return view('pages.frontend.artikel', compact('articles'));
    }

    public function detailartikel(Request $request, $slug)
    {
        $article = Article::with(['user'])->where('slug', $slug)->firstOrFail();
        // dd($article);

        return view('pages.frontend.detailartikel', compact('article'));
    }

    public function detailevent(Request $request, $slug)
    {
        $events = Event::where('slug', $slug)->firstOrFail();

        return view('pages.frontend.detailevent', compact('events'));
    }

    public function detaildivisi(Request $request, $slug)
    {
        $division = Division::with(['divisiongallery', 'divisionteam'])->where('slug', $slug)->firstOrFail();
        // $kordinator = Division::with(['divisioteam'])->where('position', 'KORDINATOR')->get();

        // dd($division);


        return view('pages.frontend.detaildivisi', compact('division'));
    }

    public function detailarticle(Request $request)
    {
        return view('pages.frontend.detailarticle');
    }

    public function fasilitas(Request $request)
    {
        $fasilitas = Facility::with(['fasilitasgallery'])->get();

        return view('pages.frontend.fasilitas', compact('fasilitas'));
    }

    public function detailfasilitas(Request $request, $slug)
    {
        $fasilitas = Facility::with(['fasilitasgallery'])->where('slug', $slug)->firstOrFail();

        return view('pages.frontend.detailfasilitas', compact('fasilitas'));
    }

    // public function navbar(Request $request, Event $event)
    // {
    //     $event = Event::all();

    //     return view('')
    // }
}
