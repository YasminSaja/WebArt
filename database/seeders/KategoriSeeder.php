<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Kategori default supaya form upload karya punya pilihan.
     */
    public function run(): void
    {
        $kategori = [
            'Traditional',
            'Digital',
            'Painting',
            'Drawing',
            'Sculpture',
            'Photography',
            'Illustration',
        ];

        foreach ($kategori as $nama) {
            Kategori::firstOrCreate(['nama_kategori' => $nama]);
        }
    }
}
