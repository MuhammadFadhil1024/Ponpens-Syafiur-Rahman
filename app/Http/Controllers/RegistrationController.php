<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Registration::query();
            // $removetag = strip_tags($query->description);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="flex space-x-4 justify-center">
                                <a href="' . route('dashboard.registration.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                                    Edit
                                </a>
                                <form class="" action="' . route('dashboard.registration.destroy', $item->id) . '" method="POST">
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

        return view('pages.dashboard.registration.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {

        Registration::create([
            'name' => $request->name,
            'email' => $request->email,
            'tempat_lahir' => Carbon::now()->format('d M Y'),
            'address' => $request->address,
            'phone' => $request->phone,

            'status' => $request->status,
            'asal_pt' => $request->asal_pt,
            'prodi' => $request->prodi,
            'jenjang' => $request->jenjang,
            'angkatan' => $request->angkatan,

            'nama_wali' => $request->nama_wali,
            'phone_wali' => $request->phone_wali,
        ]);
        return redirect()->route('dashboard.registration.index');
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
    public function edit(Registration $registration)
    {
        return view('pages.dashboard.registration.edit', [
            'item' => $registration
        ]);
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
