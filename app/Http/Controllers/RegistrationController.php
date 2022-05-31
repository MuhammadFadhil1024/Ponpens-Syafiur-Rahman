<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\RegistrationRequest;
use App\Models\Document;

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
            $query = Registration::where('users_id', Auth::user()->id);
            // $removetag = strip_tags($query->description);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    // dd($id);
                    return '
                            <div class="flex space-x-4 justify-center">
                                <a href="' . route('dashboard.registration.index', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
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
                ->addColumn('button', function ($item) {
                    // dd($item->id);
                    if ($item->status == 'document') {
                        return '
                        <div class="flex space-x-4 justify-center">
                            <a href="' . route('dashboard.registration.document.index', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                                Document
                            </a>
                        </div>
                        ';
                    }
                    if ($item->status == 'assignment') {
                        return '
                        <div class="flex space-x-4 justify-center">
                        <a href="' . route('dashboard.registration.assigntment.index', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                            Pemberkasan
                        </a>
                    </div>
                        ';
                    }
                })
                ->rawColumns(['action', 'button', 'assignment'])
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
<<<<<<< Updated upstream
    public function store(RegistrationRequest $request, Registration $registration)
    {
        $tanggal_lahir = $request->tanggal_lahir;

        $year = Carbon::createFromFormat('d/m/Y', $tanggal_lahir)->format('Y');
        // dd($year);

        Registration::create([
            'name' => $request->name,
            'email' => $request->email,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
=======
    public function store(RegistrationRequest $request, User $user)
    {
        Registration::create([
            'name' => $request->name,
            'email' => $request->email,
            'users_id' => Auth::user()->id,
            'tempat_lahir' => Carbon::now()->format('d M Y'),
>>>>>>> Stashed changes
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
            'item' => $registration,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegistrationRequest $request, Registration $registration)
    {
        $data = $request->all();

        $registration->name = $request->name;
        $registration->email= $request->email;
        $registration->tempat_lahir = $request->tempat_lahir;
        $registration->tanggal_lahir = $request->tanggal_lahir;
        $registration->address = $request->address;
        $registration->phone = $request->phone;

        $registration->status = $request->status;
        $registration->asal_pt = $request->asal_pt;
        $registration->prodi = $request->prodi;
        $registration->jenjang = $request->jenjang;
        $registration->angkatan= $request->angkatan;

        $registration->nama_wali = $request->nama_wali;
        $registration->phone_wali = $request->phone_wali;

        $registration->update($data);

        return redirect()->route('dashboard.registration.index');
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
