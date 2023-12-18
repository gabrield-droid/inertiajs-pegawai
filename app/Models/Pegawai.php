<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    /* Properti fillable digunakan untuk mengizinkan sebuah atribut agar dapat menyimpan data ke dalam database */
    protected $fillable = [
        'nama_pegawai', 'jabatan', 'jenis_kelamin', 'tgl_lahir', 'alamat'
    ];
}
