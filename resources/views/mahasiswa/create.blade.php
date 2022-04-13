@extends('mahasiswa.layout')
 
@section('content')
 
<div class="container mt-5">
 
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Tambah Mahasiswa
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
        @csrf
            <div class="form-group">
                <label for="Nim">NIM</label> 
                <input type="text" name="Nim" class="form-control" id="Nim" aria-describedby="Nim" > 
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label> 
                <input type="Nama" name="Nama" class="form-control" id="Nama" aria-describedby="Nama" > 
            </div>
            <div class="form-group">
                <label for="Kelas">Kelas</label> 
                <select class="form-control">
                @foreach($kelas as $kls)
                    <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                @endforeach
                </select>
                <!-- <input type="Kelas" name="Kelas" class="form-control" id="Kelas" aria-describedby="password" >  -->
            </div>
            <div class="form-group">
                <label for="Jurusan">Jurusan</label> 
                <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" aria-describedby="Jurusan" > 
            </div>
            <!-- <div class="form-group">
                <label for="JenisKelamin">Jenis Kelamin</label> 
                <input type="text" name="JenisKelamin" class="form-control" id="JenisKelamin" aria-describedby="JenisKelamin" > 
            </div>
            <div class="form-group">
                <label for="Email">E-mail</label> 
                <input type="Email" name="Email" class="form-control" id="Email" aria-describedby="Email" > 
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label> 
                <input type="Alamat" name="Alamat" class="form-control" id="Alamat" aria-describedby="Alamat" > 
            </div>
            <div class="form-group">
                <label for="TanggalLahir">Tanggal Lahir</label> 
                <input type="TanggalLahir" name="TanggalLahir" class="form-control" id="TanggalLahir" aria-describedby="TanggalLahir" > 
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
 </div>
 </div>
@endsection