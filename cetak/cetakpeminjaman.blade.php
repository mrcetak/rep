<html>
	<head>
		<title>Laporan Peminjaman</title>
		<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	</head>

	<body>
	<center>
			<p>
				<h1>LAPORAN PEMINJAMAN</h1>	
			</p>
			</center>
		<hr>
	<center><b>Tabel Data Peminjaman</b></center>
	<br>

	 <table class="table table-bordered table-striped" border="1">
            <thead>
                <tr>
          <th>No</th>
          <th>Inventaris ID</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th width="2%">Jumlah</th>
          <th width="8%">Status Peminjaman</th>
          <th width="2%">Pegawai ID</th>                
                </tr>
            </thead>

            <tbody>
           @foreach($datapeminjaman as $dpp)
                <tr>
            <td>{{$dpp->id}}</td>
          <td>{{$dpp->inventaris_id}}</td>
          <td>{{$dpp->tanggal_pinjam}}</td>
          <td>{{$dpp->tanggal_kembali}}</td>
          <td>{{$dpp->jumlah}}</td>
          <td>{{$dpp->status_peminjaman}}</td>
          <td>{{$dpp->pegawai_id}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

	</center>
  
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	</body>
</html>