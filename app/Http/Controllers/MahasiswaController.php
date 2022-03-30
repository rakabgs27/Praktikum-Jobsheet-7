<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('cari')) {
            $paginate = Mahasiswa::where('nama', 'like', '%' . request('cari') . '%')->paginate(5);
            return view('mahasiswa.index', ['paginate'=>$paginate]);
        }

        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswa = Mahasiswa::all(); 
        $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(5); 
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'JenisKelamin'=> 'required',
            'Email'=> 'required',
            'Alamat'=> 'required',
            'TanggalLahir'=> 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Mahasiswa::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('mahasiswa.detail', compact('Mahasiswa'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first();
        return view('mahasiswa.edit', compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'JenisKelamin'=> 'required',
            'Email'=> 'required',
            'Alamat'=> 'required',
            'TanggalLahir'=> 'required', 
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::where('nim', $nim)
            ->update([
                'nim'=>$request->Nim,
                'nama'=>$request->Nama,
                'kelas'=>$request->Kelas,
                'jurusan'=>$request->Jurusan,
                'jenisKelamin'=>$request->JenisKelamin,
                'email'=>$request->Email,
                'alamat'=>$request->Alamat,
                'tanggalLahir'=>$request->TanggalLahir,
            ]);
        
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::where('nim', $nim)->delete();
        return redirect()->route('mahasiswa.index')
            -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function cari(Request $request)
	{
        if (request('cari')) {
            $paginate = Mahasiswa::where('nama', 'like', '%' . request('cari') . '%')
                                ->orwhere('nim', 'like', '%' . request('cari') . '%')
                                ->orwhere('email', 'like', '%' . request('cari') . '%')
                                ->orwhere('jenisKelamin', 'like', '%' . request('cari') . '%')
                                ->orwhere('tanggalLahir', 'like', '%' . request('cari') . '%')
                                ->orwhere('alamat', 'like', '%' . request('cari') . '%')
                                ->orwhere('kelas', 'like', '%' . request('cari') . '%')
                                ->orwhere('jurusan', 'like', '%' . request('cari') . '%')->paginate(5);
            return view('mahasiswa.index', ['paginate'=>$paginate]);
        }
 
	}
}
