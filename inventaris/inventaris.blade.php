@extends('layouts.desain')
@section('judul')
Inventaris
@endsection
@section('kepala')
Inventaris
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

		<table id="inventaris_table" class="table table-bordered table-hover">
			<thead style="background-color: #F7F7F7;">
				<tr >
					<th>No</th>
					<th>Nama</th>
					<th>Kondisi</th>
					<th>Keterangan</th>
          <th width="2%">Jumlah</th>
          <th width="2%">Jenis_ID</th>
          <th width="2%">Tanggal Register</th>
          <th width="2%">Ruang ID</th>
          <th width="2%">Kode</th>
          <th width="2%">Petugas ID</th>
					<th width="12%">Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($datainven as $di)
				<tr>
					<td>{{$di->id}}</td>
					<td>{{$di->nama}}</td>
					<td>{{$di->kondisi}}</td>
					<td>{{$di->keterangan}}</td>
          <td>{{$di->jumlah}}</td>
          <td>{{$di->jenis_id}}</td>
          <td style="font-size: 12px;">{{$di->created_at}}</td>
          <td>{{$di->ruang_id}}</td>
          <td>{{$di->kode_inventaris}}</td>
          <td>{{$di->user_id}}</td>
					<td width="12%">
				<a href="{{route('inventaris.edit',['id'=>$di->id])}}" class="btn btn-info btn-sm">Ubah</a>
				<a href="{{route('inventaris.hapus',['id'=>$di->id])}}" class="btn btn-danger btn-sm">Hapus</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#simpan">Tambahkan Data</a>
@role('admin')
	<a href="{{route('inventaris.cetak')}}" class="btn btn-success" target="_blank">Cetak PDF</a>
@endrole
	<form action="{{route('inventaris.simpan')}}" method="POST">
		{{csrf_field()}}

<div id="simpan" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
       <h4 class="modal-title">Input Inventaris</h4>

      </div>
	  <div class="modal-body">

		    <div class="form-grup">
            <label for="nama">Nama Inventaris</label>
            <input type="text" name="nama" class="form-control" id="nama">
        </div>

		    <div class="form-grup">
            <label for="kondisi">Kondisi</label>
            <input type="text" name="kondisi" class="form-control" id="kondisi">
        </div>

        <div class="form-grup">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan">
        </div>

        <div class="form-grup">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" min="1" class="form-control" id="jumlah">
        </div>

        <div class="form-grup">
            <label for="jenis_id">Jenis ID</label>
            <select name="jenis_id" id="jenis_id" class="form-control">
            @foreach($datajenis as $dj)
              <option value="{{$dj->id}}">{{$dj->nama_jenis}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-grup">
            <label for="ruang_id">Ruang ID</label>
            <select name="ruang_id" id="ruang_id" class="form-control">
            @foreach($dataruang as $dr)
              <option value="{{$dr->id}}">{{$dr->nama_ruang}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-grup">
            <label for="kode_inventaris">Kode Inventaris</label>
            <input type="text" name="kode_inventaris" class="form-control" id="kode_inventaris">
        </div>

        <div class="form-grup">
            <label for="user_id">User ID</label>
            <input type="text" readonly="" value="{{Auth::user()->name}}" class="form-control">
            <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
        </div>

	  </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div>
	
	</form>

@endsection

@push('scripts')
<script>

	$(function () {

    $('#inventaris_table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength'  : 5,
      buttons:['edit']

    })
  })


</script>
@endpush
