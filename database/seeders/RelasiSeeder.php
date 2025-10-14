<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wali;
use App\Models\Mahasiswa;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = Mahasiswa::create([
    'nama' => 'Candra Herdiansyah',
    'nim'  => '123456',
]);

Wali::create([
    'nama'         => 'Pak Herdi',
    'id_mahasiswa' => $mahasiswa->id,
]);

    }
}
