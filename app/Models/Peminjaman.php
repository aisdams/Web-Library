<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Anggota;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    protected $fillable = [
        'tanggal_pinjam','tanggal_kembali', 'buku_id', 'anggota_id','petugas_id','jumlahbuku_pinjam','status'
    ];
    protected $primaryKey = "id";
    public function buku(){
        return $this->belongsTo(Book::class);
    }
    public function anggota(){
        return $this->belongsTo(Anggota::class);
    }
    public function petugas(){
        return $this->belongsTo(Petugas::class);
    }
    use HasFactory;
}
