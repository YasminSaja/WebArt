<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $primaryKey = 'id_karya';
    protected $fillable = [
        'judul',
        'deskripsi',
        'file_gambar',
        'id_user',
        'id_kategori',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
     public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
