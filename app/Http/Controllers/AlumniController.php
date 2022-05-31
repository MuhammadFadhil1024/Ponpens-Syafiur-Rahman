<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumniRequest;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Alumni::query();
            // $removetag = strip_tags($query->description);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    // dd($item);
                    return '
                        <div class="flex space-x-4 justify-center">
                        <a href="' . route('dashboard.alumni.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                            Edit
                        </a>
                        <form class="" action="' . route('dashboard.alumni.destroy', $item->id) . '" method="POST">
                            <button class=" bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                Delete
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
        return view('pages.dashboard.alumni.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumniRequest $request, Alumni $alumni)
    {
        $files = $request->file('file');
        // dd($files);

        if ($request->hasFile('file')) {

            $path = $files->store('public/alumni');

            Alumni::create([
                'name' => $request->name,
                'content' => $request->content,
                'url' => $path
            ]);
        }

        return redirect()->route('dashboard.alumni.index');
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
    public function edit(Alumni $alumni)
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
    public function destroy(Alumni $alumnus)
    {
        // return $alumnus;

        $alumnus->delete();

        return redirect()->route('dashboard.alumni.index');
    }
}
