<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\DivisionRequest;
use GuzzleHttp\Promise\Create;
use Yajra\DataTables\Facades\DataTables;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Division::query();
            // $removetag = strip_tags($query->description);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="flex space-x-4 justify-center">
                                <a href="' . route('dashboard.division.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                                    Edit
                                </a>
                                <a href="' . route('dashboard.division.divisiongallery.index', $item->id) . '" class="bg-green-500 text-white rounded-md px-2 py-1 m-2">
                                    Gallery
                                </a>
                                <form class="" action="' . route('dashboard.division.destroy', $item->id) . '" method="POST">
                                    <button class=" bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                        Delete
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
        return view('pages.dashboard.division.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.division.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionRequest $request, Division $division)
    {
        $data = request()->all();

        $data['slug'] = Str::slug($request->name);
        Division::create($data);

        return redirect()->route('dashboard.division.index');
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
    public function edit(Division $division)
    {
        return view('pages.dashboard.division.edit', [
            'item' => $division
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DivisionRequest $request, Division $division)
    {
        $data = request()->all();

        $data['slug'] = Str::slug($request->name);

        $division->update($data);

        return redirect()->route('dashboard.division.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();

        return redirect()->route('dashboard.division.index');
    }
}
