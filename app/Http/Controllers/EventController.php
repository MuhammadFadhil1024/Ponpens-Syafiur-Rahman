<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Event::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="flex space-x-4 justify-center">
                                <a href="' . route('dashboard.event.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                                    Edit
                                </a>
                                <a href="' . route('dashboard.event.eventgallery.index', $item->id) . '" class="bg-green-500 text-white rounded-md px-2 py-1 m-2">
                                    Galeri
                                </a>
                                <form class="" action="' . route('dashboard.event.destroy', $item->id) . '" method="POST">
                                    <button class=" bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                        Hapus
                                    </button>
                                ' . method_field('delete') . csrf_field() . '
                                </form>
                            </div>
                            ';
                })
                ->rawColumns(['action'])
                ->editColumn('description', '{{ strip_tags($description) }}')
                ->make();
        }
        return view('pages.dashboard.event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request, Event $event)
    {
        $date = $request->date;

        $year = Carbon::createFromFormat('d/m/Y', $date)->format('Y');
        // dd($year);

        $slug = Str::slug($request->name);

        Event::create([
            'name' => $request->name,
            'year' => $year,
            'date' => $date,
            'location' => $request->location,
            'description' => $request->description,
            'slug' => $slug
        ]);

        return redirect()->route('dashboard.event.index');
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
    public function edit(Event $event)
    {
        return view('pages.dashboard.event.edit', [
            'item' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        // dd($event);
        $this->validate($request, [
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'required'
        ]);

        $slug = Str::slug($request->name);

        $event->name = $request->name;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->slug = $slug;

        $event->save();

        return redirect()->route('dashboard.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('dashboard.event.index');
    }
}
