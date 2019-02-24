@extends('layouts.desain')
@section('judul')
Edit Jenis
@endsection
@section('kepala')
Edit Jenis Inventaris
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

@section('invenaktif') active @endsection

    <form action="{{route('jenis.editproses')}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$data->id}}"> 
      <div class="form-grup">
            <label for="nama_jenis">Nama Jenis</label>
            <input type="text" name="nama_jenis" class="form-control" id="nama_jenis" value="{{$data->nama_jenis}}">
        </div>

    <div class="form-grup">
            <label for="kode_jenis">Kode Jenis</label>
            <input type="text" name="kode_jenis" class="form-control" id="kode_jenis" value="{{$data->kode_jenis}}">
        </div>

        <div class="form-grup">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{$data->keterangan}}">
        </div> <br>
        <button type="submit" class="btn btn-primary">Ubah</button>

    </form>


@endsection
