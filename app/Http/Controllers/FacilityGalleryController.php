<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Models\FacilityGallery;
use App\Http\Requests\FacilityRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\FacilityGalleryRequest;

class FacilityGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Facility $facility)
    {
        if (request()->ajax()) {
            $query = FacilityGallery::where('facilitys_id', $facility->id);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form class="inline-block" action="' . route('dashboard.facilitygallery.destroy', $item->id) . '" method="POST">
                            <button class="inline-block bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                Delete
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
        return view('pages.dashboard.facilitygallery.index', compact('facility'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Facility $facility)
    {
        return view('pages.dashboard.facilitygallery.create', compact('facility'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityGalleryRequest $request, Facility $facility)
    {
        $files = $request->file('files');

        if ($request->hasFile('files')) {

            foreach ($files as $file) {
                $path = $file->store('public/facilitygallery');

                FacilityGallery::create([
                    'facilitys_id' => $facility->id,
                    'url' => $path
                ]);
            }
        }

        return redirect()->route('dashboard.facility.facilitygallery.index', $facility->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FacilityGallery  $facilityGallery
     * @return \Illuminate\Http\Response
     */
    public function show(FacilityGallery $facilityGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FacilityGallery  $facilityGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(FacilityGallery $facilityGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FacilityGallery  $facilityGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacilityGallery $facilityGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FacilityGallery  $facilityGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacilityGallery $facilitygallery)
    {
        $facilitygallery->delete();

        return redirect()->route('dashboard.facility.facilitygallery.index', $facilitygallery->facilitys_id);
    }
}
