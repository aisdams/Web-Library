<?php

namespace App\Models;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    protected $fillable = [
        'kode_buku','judul_buku', 'image', 'penulis_buku', 'penerbit_buku','stok','jumlah_tersedia','jumlah_rusak','jumlah_pinjam'
    ];
    protected $primaryKey = "id";
    use HasFactory;
    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
    public function pengembalian(){
        return $this->hasMany(Pengembalian::class);
    }
}
