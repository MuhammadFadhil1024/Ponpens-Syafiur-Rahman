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
    public function index()
    {
        if (request()->ajax()) {
            $query = Document::query();
            // $removetag = strip_tags($query->description);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="flex space-x-4 justify-center">
                                <a href="' . route('dashboard.document.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                                    Edit
                                </a>
                                <form class="" action="' . route('dashboard.document.destroy', $item->id) . '" method="POST">
                                    <button class=" bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                        Delete
                                    </button>
                                ' . method_field('delete') . csrf_field() . '
                                </form>
                            </div>
                            ';
                })
                ->editColumn('foto', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::foto($item->foto) . '"/>';
                })
                ->editColumn('ktp', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::ktp($item->ktp) . '"/>';
                })
                ->editColumn('sp', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::sp($item->sp) . '"/>';
                })
                ->editColumn('sk', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::sk($item->sk) . '"/>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.document.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Document $request, Registration $registration)
    {
        $foto = $request->file('foto');

        if ($request->hasFile('foto')) {
            $path = $foto->store('public/document');

            Document::create([
                'registration_id' => $registration->id,
                'foto' => $path,
            ]);
        }

        $ktp = $request->file('ktp');

        if ($request->hasFile('ktp')) {
            $path = $ktp->store('public/document');

            Document::create([
                'registration_id' => $registration->id,
                'ktp' => $path,
            ]);
        }

        $sk = $request->file('sk');

        if ($request->hasFile('sk')) {
            $path = $sk->store('public/document');

            Document::create([
                'registration_id' => $registration->id,
                'sk' => $path,
            ]);
        }

        $sp = $request->file('sp');

        if ($request->hasFile('sp')) {
            $path = $sp->store('public/document');

            Document::create([
                'registration_id' => $registration->id,
                'sp' => $path,
            ]);
        }

        return redirect()->route('dashboard.document.index', $registration->id);

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
    public function destroy($id)
    {
        //
    }
}
