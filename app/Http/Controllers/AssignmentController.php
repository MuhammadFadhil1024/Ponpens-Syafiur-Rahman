<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Requests\AssignmntRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Registration $registration, Assignment $assignment)
    {
        if (request()->ajax()) {
            $query = Assignment::where('registrations_id', $registration->id);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    // dd($item->id);
                    return '
                            <div class="flex space-x-4 justify-center">
                                <a href="' . route('dashboard.registration.assigntment.edit', ['registration' => $item->registrations_id, 'assigntment' => $item->id]) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                                    Edit
                                </a>
                            </div>
                            ';
                })
                ->editColumn('writing', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::url($item->writing) . '"/>';
                })
                ->rawColumns(['action', 'writing'])
                ->make();
        }
        return view('pages.dashboard.assignment.index', compact('registration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Registration $registration)
    {
        return view('pages.dashboard.assignment.create', compact('registration'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignmntRequest $request, Registration $registration)
    {
        $foto = $request->file('writing');

        if ($request->hasFile('writing')) {
            $path = $foto->store('public/document');

            Assignment::create([
                'registrations_id' => $registration->id,
                'writing' => $path,
                'reading' => $request->reading
            ]);
        }

        return redirect()->route('dashboard.registration.assigntment.index', $registration->id);
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
    public function edit()
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
    public function destroy($id)
    {
        //
    }
}
