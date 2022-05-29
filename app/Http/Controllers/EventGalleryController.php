<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventGalleryRequest;
use App\Models\Event;
use App\Models\EventGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class EventGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        if (request()->ajax()) {
            $query = EventGallery::where('events_id', $event->id);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form class="inline-block" action="' . route('dashboard.eventgallery.destroy', $item->id) . '" method="POST">
                            <button class="inline-block bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                Hapus
                            </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->editColumn('url', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::url($item->url) . '"/>';
                })
                ->rawColumns(['action', 'url'])
                ->make();
        }
        return view('pages.dashboard.eventgallery.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('pages.dashboard.eventgallery.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventGalleryRequest $request, Event $event)
    {
        // mengambil semua request dari pages create eventgallery
        $files = $request->file('files');

        //memeriksa apakah semua request dari field files adalah file 
        if ($request->hasFile('files')) {

            foreach ($files as $file) {
                $path = $file->store('public/eventgallery');

                EventGallery::create([
                    'events_id' => $event->id,
                    'url' => $path
                ]);
            }
        }

        return redirect()->route('dashboard.event.eventgallery.index', $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventGallery $eventgallery)
    {
        $eventgallery->delete();

        return redirect()->route('dashboard.event.eventgallery.index', $eventgallery->events_id);
    }
}
