<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaMatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mhsmtkl = [
            [   'mahasiswa_id' => 2,
                'matakuliah_id'=>3,
                'nilai'=>'A',
            ],
            [   'mahasiswa_id' => 1,
                'matakuliah_id'=>4,
                'nilai'=>'B',
            ],
            [   'mahasiswa_id' => 3,
                'matakuliah_id'=>1,
                'nilai'=>'A',
            ],
            [   'mahasiswa_id' => 4,
                'matakuliah_id'=>2,
                'nilai'=>'B',
            ],
            [   'mahasiswa_id' => 5,
                'matakuliah_id'=>3,
                'nilai'=>'A',
            ],
           
        ];

        DB::table('mahasiswa_matakuliah')->insert($mhsmtkl);
    }
}
