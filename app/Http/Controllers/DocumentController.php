<?php

namespace App\Http\Controllers;

use App\Models\Document;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DocumentRequest;
use App\Models\Registration;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Registration $registration, Document $document)
    {
        $cek = Document::where('registrations_id', $registration->id)->exists();
        // dd($cek);
        if (request()->ajax()) {
            $query = Document::where('registrations_id', $registration->id);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    // dd($item->id);
                    return '
                            <div class="flex space-x-4 justify-center">
                                <a href="' . route('dashboard.registration.document.edit', ['registration' => $item->registrations_id, 'document' => $item->id]) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                                    Edit
                                </a>
                                <form class="" action="' . route('dashboard.registration.document.destroy', ['registration' => $item->registrations_id, 'document' => $item->id]) . '" method="POST">
                                    <button class=" bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                        Delete
                                    </button>
                                ' . method_field('delete') . csrf_field() . '
                                </form>
                            </div>
                            ';
                })
                ->editColumn('foto', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::url($item->foto) . '"/>';
                })
                ->editColumn('ktp', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::url($item->ktp) . '"/>';
                })
                ->editColumn('sp', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::url($item->sp) . '"/>';
                })
                ->editColumn('sk', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::url($item->sk) . '"/>';
                })
                ->rawColumns(['action', 'foto', 'ktp', 'sp', 'sk'])
                ->make();
        }
        return view('pages.dashboard.document.index', compact('registration', 'document', 'cek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Registration $registration)
    {
        // dd($registration->id);
        return view('pages.dashboard.document.create', compact('registration'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request, Registration $registration)
    {
        // dd($registration->id);
        $foto = $request->file('foto');
        $ktp = $request->file('ktp');
        $sk = $request->file('sk');
        $sp = $request->file('sp');

        if ($request->hasFile('foto', 'ktp', 'sk', 'sp')) {
            $foto_path = $foto->store('public/document');
            $ktp_path = $ktp->store('public/document');
            $sk_path = $sk->store('public/document');
            $sp_path = $sp->store('public/document');

            Document::create([
                'registrations_id' => $registration->id,
                'foto' => $foto_path,
                'ktp'  => $ktp_path,
                'sp' => $sp_path,
                'sk' => $sk_path
            ]);
        }

        // if ($request->hasFile('foto')) {
        //     $path = $foto->store('public/document');

        //     Document::create([
        //         'registration_id' => $registration->id,
        //         'foto' => $path,
        //     ]);
        // }

        // $ktp = $request->file('ktp');

        // if ($request->hasFile('ktp')) {
        //     $path = $ktp->store('public/document');

        //     Document::create([
        //         'registration_id' => $registration->id,
        //         'ktp' => $path,
        //     ]);
        // }

        // $sk = $request->file('sk');

        // if ($request->hasFile('sk')) {
        //     $path = $sk->store('public/document');

        //     Document::create([
        //         'registration_id' => $registration->id,
        //         'sk' => $path,
        //     ]);
        // }

        // $sp = $request->file('sp');

        // if ($request->hasFile('sp')) {
        //     $path = $sp->store('public/document');

        //     Document::create([
        //         'registration_id' => $registration->id,
        //         'sp' => $path,
        //     ]);
        // }

        return redirect()->route('dashboard.registration.document.index', $registration->id);
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
    public function edit(Registration $registration, Document $document)
    {
        // dd($document);
        return view('pages.dashboard.document.edit', [
            'registration' => $registration,
            'document' => $document
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
