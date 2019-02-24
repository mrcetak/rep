@extends('layouts.desain')
@section('judul')
Pengembalian
@endsection
@section('kepala')
Pengembalian
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

		<table id="pengembalian_table" class="table table-bordered table-hover">
			<thead style="background-color: #F7F7F7;">
				<tr>
					<th>No</th>
					<th>Peminjaman ID</th>
					<th>Tanggal Kembali</th>
          <th width="2%">Jumlah</th>
          <th width="8%">Status Pengembalian</th>
          <th width="2%">Pegawai ID</th>
					<th width="12%">Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($datapengembalian as $dpg)
				<tr>
          <td>{{$dpg->id}}</td>
					<td>{{$dpg->peminjaman_id}}</td>
					<td>{{$dpg->tanggal_kembali}}</td>
					<td>{{$dpg->jumlah}}</td>
          <td>{{$dpg->status_pengembalian}}</td>
          <td>{{$dpg->pegawai_id}}</td>
          
					<td width="12%">
				<a href="{{route('pengembalian.edit',['id'=>$dpg->id])}}" class="btn btn-info btn-sm">Ubah</a>
				<a href="{{route('pengembalian.hapus',['id'=>$dpg->id])}}" class="btn btn-danger btn-sm">Hapus</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#simpan">Tambahkan Data</a>
@role('admin')  
	<a href="{{route('pengembalian.cetak')}}" class="btn btn-success" target="_blank">Cetak PDF</a>
@endrole
	<form action="{{route('pengembalian.simpan')}}" method="POST">
		{{csrf_field()}}

<div id="simpan" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
       <h4 class="modal-title">Input Pengembalian</h4>

      </div>
	  <div class="modal-body">

		    <div class="form-grup">
            <label for="peminjaman_id">Peminjaman ID</label>
            <select name="peminjaman_id" id="peminjaman_id" class="form-control">
            @foreach($datapeminjaman as $dpn)
              <option value="{{$dpn->id}}">{{$dpn->id}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-grup">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" id="tanggal_kembali">
        </div>

        <div class="form-grup">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" min="1" class="form-control" id="jumlah">
        </div>

        <div class="form-grup">
            <label for="status_pengembalian">Status Pengembalian</label>
            <select name="status_pengembalian" id="status_pengembalian" class="form-control">
              <option value="Dipinjam">Dipinjam</option>
              <option value="Dikembalikan">Dikembalikan</option>
            </select>
        </div>

        <div class="form-grup">
            <label for="pegawai_id">Pegawai ID</label>
            <select name="pegawai_id" id="pegawai_id" class="form-control">
            @foreach($datapegawai as $dp)
              <option value="{{$dp->id}}">{{$dp->nama_pegawai}}</option>
            @endforeach
            </select>
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

    $('#pengembalian_table').DataTable({
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
