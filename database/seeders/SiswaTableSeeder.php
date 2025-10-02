<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    

     $siswa =[
        [
            'nama' => 'auny silvia',
            'jenis_kelamin' => 'perempuan',
            'NIS' => 2009270,
            'TTL' => 20090327,
        ],
        [
            'nama' => 'asri bunga',
            'jenis_kelamin' => 'perempuan',
            'NIS' => 2009011,
            'TTL' => 20091201,
        ],
        [
            'nama'          => 'alifhia awaliyah',
            'jenis_kelamin' => 'perempuan',
            'NIS'           => 200822,
            'TTL'           => 20081222,
        ],
        [
            'nama'          => 'maryana tri purnama',
            'jenis_kelamin' => 'perempuan',
            'NIS'           => 200920,
            'TTL'           => 20090517,
        ],
        [
            'nama'          => 'salsa agustina',
            'jenis_kelamin' => 'perempuan',
            'NIS'           => 200908,
            'TTL'           => 20090804,
        ],
    ];
    DB::table('siswa')->insert($siswa);
    }
}
