<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "judul" => 'required',
            "kategori" =>'required',
            "penulis" => 'required',
            "isi" => 'required'


        ]);

        $artikel=Article::create($request->all());
        return response()->json($artikel,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Article::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        "judul" => 'required|max:255',
        "kategori" => 'required|max:255',
        "penulis" => 'required|max:255',
        "isi" => 'required|string' 
    ]);

    $artikel = Article::findOrFail($id);
    $artikel->update($request->all());

    return response()->json($artikel, 200); 
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $artikel = Article::findOrFail($id);
    $artikel->delete();

    return response()->json(null, 204); 
}

}
