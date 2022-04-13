<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;

class Mahasiswa_MataKuliah extends Model
{
    use HasFactory;
    protected $table='mahasiswa_matakuliah'; 
    protected $primaryKey = 'id';

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

//     public function mhs_matkul()
//     {
//         return $this->belongsToMany(Mahasiswa::class, Mahasiswa_MataKuliah::class, 'mahasiswa_id', 'matakuliah_id')-> withPivot('nilai');
//     }
}
