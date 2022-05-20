<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisionTeamRequest;
use App\Models\Division;
use App\Models\DivisionTeam;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DivisionTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Division $division)
    {
        if (request()->ajax()) {
            $query = DivisionTeam::where('divisions_id', $division->id);
            // $removetag = strip_tags($query->description);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="flex space-x-4 justify-center">
                                <form class="" action="' . route('dashboard.divisionteam.destroy', $item->id) . '" method="POST">
                                    <button class=" bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                        Delete
                                    </button>
                                ' . method_field('delete') . csrf_field() . '
                                </form>
                            </div>
                            ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.divisionteam.index', compact('division'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Division $division)
    {
        return view('pages.dashboard.divisionteam.create', compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionTeamRequest $request, Division $division)
    {
        $division_id = $division->id;

        DivisionTeam::create([
            'name' => $request->name,
            'divisions_id' => $division_id,
            'position' => $request->position
        ]);

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
    public function destroy(DivisionTeam $divisionteam)
    {
        $divisionteam->delete();

        return redirect()->route('dashboard.division.divisionteam.index', $divisionteam->divisions_id);
    }
}
