@extends('layout.template')
   <!-- START FORM -->
   @section('konten')


   <form action='{{ url('mentee/'.$data->nim) }}' method='post'>
    @csrf 
    @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href= '{{ url('mentee') }}' class="btn btn-secondary" > <<= Kembali </a>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                   {{ $data->nim }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='prodi' value="{{ $data->prodi }}" id="prodi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
    @endsection
        <!-- AKHIR FORM -->