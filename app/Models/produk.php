<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table= 'produks';//nama tabel sesuai di databes mysql
    //membuat tabel produk
    protected $primaryKey = 'kode_produk'; //menentukan primary key
    //membuat kolom yg bisa diisi
    protected $fillable = ['kode_produk', 'nama_produk', 'deskripsi', 'harga', 'jumlah_produk', 'image'];
}
