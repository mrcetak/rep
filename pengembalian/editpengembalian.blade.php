@extends('layouts.desain')
@section('judul')
Edit Pengembalian
@endsection
@section('kepala')
Edit Pengembalian
@endsection

@section('isi')

 		@if ($errors->any())
            <div class="alert {{-- alert-danger --}} alert-dismissible" style="background-color: #F4AC33;">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('pesan'))
            <div class="alert alert-dismissible" style="background-color: #009CC4;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!!session()->get('pesan')!!}
            </div>
        @endif

@section('pengembalianaktif') active @endsection

		<form action="{{route('pengembalian.editproses')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-grup">
            <label for="peminjaman_id">Peminjaman ID</label>
            <select name="peminjaman_id" id="peminjaman_id" class="form-control">
            @foreach($datapeminjaman as $dpn)
              <option value="{{$dpn->id}}" @if($data->peminjaman_id==$dpn->id) selected="selected" @endif>{{$dpn->id}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-grup">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" id="tanggal_kembali" value="{{$data->tanggal_kembali}}">
        </div>

        <div class="form-grup">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" min="1" class="form-control" id="jumlah" value="{{$data->jumlah}}">
        </div>

        <div class="form-grup">
            <label for="status_pengembalian">Status Pengembalian</label>
            <select name="status_pengembalian" id="status_pengembalian" class="form-control">
              <option value="Dikembalikan">Dikembalikan</option>
              <option value="Dipinjam">Dipinjam</option>
            </select>
        </div>

        <div class="form-grup">
            <label for="pegawai_id">Pegawai ID</label>
            <select name="pegawai_id" id="pegawai_id" class="form-control">
            @foreach($datapegawai as $dp)
              <option value="{{$dp->id}}" @if($data->pegawai_id==$dp->id) selected="selected" @endif>{{$dp->nama_pegawai}}</option>
            @endforeach
            </select>
        </div><br>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>



@endsection


