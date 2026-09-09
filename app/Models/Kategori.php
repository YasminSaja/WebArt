<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $primarykey = 'id_kategori'; 

    protected $fillable = [
        'nama_kategori',
    ];

    public function karyas()
    {
        return $this->hasMany(Karya::class,
        'id_kategori', 'id_kategori');
    }
}
