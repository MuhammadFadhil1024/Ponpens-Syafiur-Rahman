<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisionGalleryRequest;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\DivisionGallery;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DivisionGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Division $division)
    {
        if (request()->ajax()) {
            $query = DivisionGallery::where('divisions_id', $division->id);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form class="inline-block" action="' . route('dashboard.divisiongallery.destroy', $item->id) . '" method="POST">
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
        return view('pages.dashboard.divisiongallery.index', compact('division'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Division $division)
    {
        return view('pages.dashboard.divisiongallery.create', compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionGalleryRequest $request, Division $division)
    {
        $files = $request->file('files');

        if ($request->hasFile('files')) {

            foreach ($files as $file) {
                $path = $file->store('public/divisiongallery');

                DivisionGallery::create([
                    'divisions_id' => $division->id,
                    'url' => $path
                ]);
            }
        }

        return redirect()->route('dashboard.division.divisiongallery.index', $division->id);
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
    public function destroy(DivisionGallery $divisiongallery)
    {
        $divisiongallery->delete();

        return redirect()->route('dashboard.division.divisiongallery.index', $divisiongallery->divisions_id);
    }
}
