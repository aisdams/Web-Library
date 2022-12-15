<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::paginate(5);
        return view('book/index',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pt = $request->image;
        $ptFile = $pt->getClientOriginalName();
        $pt->move(public_path().'/img',$ptFile);
        Book::create([
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'image' => $ptFile,
            'penulis_buku' => $request->penulis_buku,
            'penerbit_buku' => $request->penerbit_buku,
            'stok' => $request->stok,
            'jumlah_tersedia' => $request->jumlah_tersedia,
            'jumlah_rusak' => $request->jumlah_rusak,
            'jumlah_pinjam' => $request->jumlah_pinjam,
        ]);

        return Redirect('/book')->with('success', 'Data Buku berhasil Ditambahkan');
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
        $book = Book::findorfail($id);
        return view('book/edit', compact('book'));
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
        $book = Book::findorfail($id);
        $book -> update($request->all());
        if($request->hasFile('image')){
            $request->file('image')->move('img/', $request->file('image')->getClientOriginalName());
            $book->image = $request->file('image')->getClientOriginalName();
            $book -> save();
        }
        return redirect('/book')->with('success', "Data Buku Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Book::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Buku Berhasil Di Delete");
    }
}
