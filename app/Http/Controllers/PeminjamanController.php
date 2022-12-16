<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::paginate(5);
        return view('perpustakaan.peminjaman.index',compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = Book::all();
        return view('perpustakaan.peminjaman/createpinjam', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'book_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'jumlahbuku_pinjam' => 'required',
            'status' => 'required',
        ]);

        $book = Peminjaman::create($request->all());

        return Redirect('/perpustakaan/peminjaman')->with('success', 'Data Buku berhasil Ditambahkan');
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
        $book = Book::all();
        $peminjaman = Peminjaman::findorfail($id);
        return view('perpustakaan.peminjaman.editpinjam', compact('book', 'peminjaman'));
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
        $peminjaman = Peminjaman::findorfail($id);
        $peminjaman -> update($request->all());
        return redirect('perpustakaan/peminjaman')->with('success', "Data Buku Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Peminjaman::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Buku Berhasil Di Delete");
    }
}
