<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ManagementRequest;
use Yajra\DataTables\Facades\DataTables;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Management::query();
            // $removetag = strip_tags($query->description);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="flex space-x-4 justify-center">
                                <a href="' . route('dashboard.management.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                                    Edit
                                </a>
                                <form class="" action="' . route('dashboard.management.destroy', $item->id) . '" method="POST">
                                    <button class=" bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                        Hapus
                                    </button>
                                ' . method_field('delete') . csrf_field() . '
                                </form>
                            </div>
                            ';
                })
                ->editColumn('url', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::url($item->url) . '"/>';
                })
                ->rawColumns(['action', 'url'])
                ->make();
        }
        return view('pages.dashboard.management.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagementRequest $request)
    {
        $file = $request->file('file');

        if ($request->hasFile('file')) {
            $path = $file->store('public/management');

            Management::create([
                'name' => $request->name,
                'position' => $request->position,
                'job' => $request->job,
                'nomor' => $request->nomor,
                'url' => $path,
            ]);
        }
        return redirect()->route('dashboard.management.index')->with('success', "Pengurus baru berhasil ditambah. ");
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
    public function edit(Management $management)
    {
        return view('pages.dashboard.management.edit', [
            'item' => $management
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        // dd($management);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'position' => 'required|string|in:PENGASUH,BINA KONSELING,GURU',
            'job' => 'required|string|max:255|in:KETUA UMUM,DEWAN GURU,BIMBINGAN KONSELING,PINISEPUH',
            'nomor' => 'required|string|max:15',
        ]);

        $file = $request->file('file');

        if ($request->hasFile('file') == "") {
            $old = $management->url;


            $management->name = $request->name;
            $management->position = $request->position;
            $management->nomor = $request->nomor;
            $management->job = $request->job;
            $management->url = $old;

            $management->save();
        } else {
            // Storage::disk('local')->delete('public/articlegallery/ .$management->link');

            $path = $file->store('public/articlegallery');

            $management->name = $request->name;
            $management->position = $request->position;
            $management->job = $request->job;
            $management->url = $path;

            $management->save();
        }
        return redirect()->route('dashboard.management.index')->with('success', "Pengurus berhasil dirubah. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Management $management)
    {
        $management->delete();

        return redirect()->route('dashboard.management.index')->with('delete', "Pengurus berhasil dihapus. ");
    }
}
