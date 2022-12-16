<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    protected $fillable = [
        'tanggal_pinjam','tanggal_kembali', 'book_id','jumlahbuku_pinjam','status'
    ];
    protected $primaryKey = "id";
    public function book(){
        return $this->belongsTo(Book::class);
    }
    use HasFactory;
}
