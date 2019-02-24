@extends('layouts.desain')
@section('judul')
Edit Pegawai
@endsection
@section('kepala')
Edit Pegawai
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

@section('pegawaiaktif') active @endsection

    <form action="{{route('pegawai.editproses')}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$data->id}}">

        <div class="form-grup">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" value="{{$data->nama_pegawai}}">
        </div>

    <div class="form-grup">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control" id="nip" value="{{$data->nip}}">
        </div>

        <div class="form-grup">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="{{$data->alamat}}">
        </div> <br>
        <button type="submit" class="btn btn-primary">Ubah</button>

    </form>


@endsection

