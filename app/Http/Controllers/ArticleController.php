<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Article::query();
            // $removetag = strip_tags($query->description);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="flex space-x-4 justify-center">
                                <a href="' . route('dashboard.article.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                                    Edit
                                </a>
                                <form class="" action="' . route('dashboard.article.destroy', $item->id) . '" method="POST">
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
        return view('pages.dashboard.article.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.article.create');
    }

    public function upload()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, User $user)
    {
        // $data = request()->all();
        $user =  Auth::user()->id;
        // dd($user);
        $file = $request->file('file');

        if ($request->hasFile('file')) {
            $path = $file->store('public/articlegallery');

            $slug = Str::slug($request->title);

            Article::create([
                'title' => $request->title,
                'users_id' => $user,
                'content' => $request->content,
                'link' => $path,
                'slug' => $slug
            ]);
        }
        return redirect()->route('dashboard.article.index');
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
    public function edit(Article $article)
    {
        return view('pages.dashboard.article.edit', [
            'item' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // $user =  Auth::user()->id;
        // dd($user);

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $file = $request->file('file');

        if ($request->hasFile('file') == "") {
            $old = $article->link;

            $slug = Str::slug($request->title);

            $article->title = $request->title;
            $article->content = $request->content;
            $article->link = $old;
            $article->slug = $slug;

            $article->save();
        } else {
            // Storage::disk('local')->delete('public/articlegallery/ .$article->link');

            $path = $file->store('public/articlegallery');

            $slug = Str::slug($request->title);

            $article->title = $request->title;
            $article->content = $request->content;
            $article->link = $path;
            $article->slug = $slug;

            $article->save();
        }
        return redirect()->route('dashboard.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('dashboard.article.index');
    }
}
