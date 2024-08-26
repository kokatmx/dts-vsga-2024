<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
// use Barryvdh\DomPDF\Facade\Pdf;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     if ($request->file('image')) {
    //         $image_name = $request->file('image')->store('images', 'public');
    //     }

    //     Article::create([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //         'featured_image' => $image_name,
    //     ]);

    //     return "<script>alert('Artikel berhasil dibuat')</script>";
    // }

    public function store(Request $request)
    {
        try {
            $image_name = null;

            if ($request->file('image')) {
                $image_name = $request->file('image')->store('images', 'public');
            }

            Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'featured_image' => $image_name,
            ]);

            return "<script>alert('Artikel berhasil dibuat')</script>";
        } catch (\Exception $e) {
            return "<script>alert('Terjadi kesalahan: {$e->getMessage()}')</script>";
        }
    }

    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', ["article" => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        if ($article->featured_image && file_exists(storage_path('app/public') . $article->featured_image)) {
            Storage::delete('public/' . $request->featured_image);
        }
        $image_name = $request->file('image')->store('image', 'public');
        $article->featured_image = $image_name;
        $article->save();
        return 'Article edited successfully';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
    public function cetak_PDF()
    {
        $articles = Article::all();
        // $pdf = PDF::loadView('articles.pdf', ['articles' => $articles]);
        // return $pdf->stream();
    }
}
