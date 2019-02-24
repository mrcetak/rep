@extends('layouts.desain')
@section('judul')
Edit Inventaris
@endsection
@section('kepala')
Edit Inventaris
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

	<form action="{{route('inventaris.editproses')}}" method="POST">
   {{csrf_field()}}
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-grup">
            <label for="nama">Nama Inventaris</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{$data->nama}}">
        </div>

        <div class="form-grup">
            <label for="kondisi">Kondisi</label>
            <input type="text" name="kondisi" class="form-control" id="kondisi" value="{{$data->kondisi}}">
        </div>

        <div class="form-grup">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{$data->keterangan}}">
        </div>

        <div class="form-grup">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" min="1" class="form-control" id="jumlah" value="{{$data->jumlah}}">
        </div>

        <div class="form-grup">
            <label for="jenis_id">Jenis ID</label>
            <select name="jenis_id" id="jenis_id" class="form-control">
            @foreach($datajenis as $dj)
              <option value="{{$dj->id}}" @if($data->jenis_id==$dj->id) selected="selected" @endif>{{$dj->nama_jenis}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-grup">
            <label for="ruang_id">Ruang ID</label>
            <select name="ruang_id" id="ruang_id" class="form-control">
            @foreach($dataruang as $dr)
              <option value="{{$dr->id}}" @if($data->ruang_id==$dr->id) selected="selected" @endif>{{$dr->nama_ruang}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-grup">
            <label for="kode_inventaris">Kode Inventaris</label>
            <input type="text" name="kode_inventaris" class="form-control" id="kode_inventaris" value="{{$data->kode_inventaris}}">
        </div>

        <div class="form-grup">
            <label for="user_id">User ID</label>
            <input type="text" readonly="" value="{{Auth::user()->name}}" class="form-control">
            <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
        </div> <br>
        <button type="submit" class="btn btn-primary">Ubah</button>

  </form>


@endsection

