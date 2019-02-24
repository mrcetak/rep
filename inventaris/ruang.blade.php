@extends('layouts.desain')
@section('judul')
Ruang
@endsection
@section('kepala')
Ruang Inventaris
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

		<table id="ruang_table" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Ruang</th>
					<th>Kode Ruang</th>
					<th>Keterangan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($dataruang as $dr)
				<tr>
					<td>{{$dr->id}}</td>
					<td>{{$dr->nama_ruang}}</td>
					<td>{{$dr->kode_ruang}}</td>
					<td>{{$dr->keterangan}}</td>
					<td width="12%">
				<a href="{{route('ruang.edit',['id'=>$dr->id])}}" class="btn btn-info btn-sm">Ubah</a>
				<a href="{{route('ruang.hapus',['id'=>$dr->id])}}" class="btn btn-danger btn-sm">Hapus</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#simpan">Tambahkan Data</a>
@role('admin')
	<a href="{{route('ruang.cetak')}}" class="btn btn-success" target="_blank">Cetak PDF</a>
@endrole
	<form action="{{route('ruang.simpan')}}" method="POST">
		{{csrf_field()}}

<div id="simpan" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
       <h4 class="modal-title">Input Ruang</h4>

      </div>
	  <div class="modal-body">

		<div class="form-grup">
            <label for="nama_ruang">Nama Ruang</label>
            <input type="text" name="nama_ruang" class="form-control" id="nama_ruang">
        </div>

		<div class="form-grup">
            <label for="kode_ruang">Kode Ruang</label>
            <input type="text" name="kode_ruang" class="form-control" id="kode_ruang">
        </div>

        <div class="form-grup">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan">
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

    $('#ruang_table').DataTable({
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
