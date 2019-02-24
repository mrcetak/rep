@extends('layouts.desain')
@section('judul')
Pegawai
@endsection
@section('kepala')
Pegawai
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

		<table id="pegawai_table" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pegawai</th>
					<th>Kode Pegawai</th>
					<th>Keterangan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($datapegawai as $dp)
				<tr>
					<td>{{$dp->id}}</td>
					<td>{{$dp->nama_pegawai}}</td>
					<td>{{$dp->nip}}</td>
					<td>{{$dp->alamat}}</td>
					<td width="12%">
				<a href="{{route('pegawai.edit',['id'=>$dp->id])}}" class="btn btn-info btn-sm">Ubah</a>
				<a href="{{route('pegawai.hapus',['id'=>$dp->id])}}" class="btn btn-danger btn-sm">Hapus</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#simpan">Tambahkan Data</a>
@role('admin')
  <a href="{{route('pegawai.cetak')}}" class="btn btn-success" target="_blank">Cetak PDF</a>
@endrole

	<form action="{{route('pegawai.simpan')}}" method="POST">
		{{csrf_field()}}

<div id="simpan" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
       <h4 class="modal-title">Input Pegawai</h4>

      </div>
	  <div class="modal-body">

		<div class="form-grup">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai">
        </div>

		<div class="form-grup">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control" id="nip">
        </div>

        <div class="form-grup">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat">
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

    $('#pegawai_table').DataTable({
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
