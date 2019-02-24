@extends('layouts.desain')
@section('judul')
Edit Ruang
@endsection
@section('kepala')
Edit Ruang Inventaris
@endsection

@section('invenaktif')
active
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

    <form action="{{ route ('ruang.editproses')}}" method="POST">
      {{csrf_field()}}
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-grup">
              <label for="nama_ruang">Nama Ruang</label>
              <input type="text" name="nama_ruang" class="form-control" id="nama_ruang" value="{{$data->nama_ruang}}">
          </div>

          <div class="form-grup">
              <label for="kode_ruang">Kode Ruang</label>
              <input type="text" name="kode_ruang" class="form-control" id="kode_ruang" value="{{$data->kode_ruang}}">
          </div>

          <div class="form-grup">
              <label for="keterangan">Keterangan</label>
              <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{$data->keterangan}}">
          </div> <br>

          <button type="submit" class="btn btn-primary">Ubah</button>

    </form>

@endsection

