<html>
	<head>
		<title>Laporan Pengembalian</title>
		<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	</head>

	<body>
	<center>
			<p>
				<h1>LAPORAN PENGEMBALIAN</h1>	
			</p>
			</center>
		<hr>
	<center><b>Tabel Data Pengembalian</b></center>
	<br>

	 <table class="table table-bordered table-striped" border="1">
            <thead>
                <tr>
          <th>No</th>
          <th>Peminjaman ID</th>
          <th>Tanggal Kembali</th>
          <th width="2%">Jumlah</th>
          <th width="8%">Status Pengembalian</th>
          <th width="2%">Pegawai ID</th>               
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
                </tr>
            @endforeach
            </tbody>
        </table>

	</center>
  
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	</body>
</html>