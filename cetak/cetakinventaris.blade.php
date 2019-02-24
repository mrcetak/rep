<html>
	<head>
		<title>Laporan Inventaris</title>
		<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	</head>

	<body>
	<center>
			<p>
				<h1>LAPORAN INVENTARIS</h1>	
			</p>
			</center>
		<hr>
	<center><b>Tabel Data Inventaris</b></center>
	<br>

	 <table class="table table-bordered table-striped" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                  <th width="2%">Jumlah</th>
                  <th width="2%">Jenis_ID</th>
                  <th width="2%">Tanggal Register</th>
                  <th width="2%">Ruang_ID</th>
                  <th width="2%">Kode</th>
                  <th width="2%">Petugas ID</th>                    
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
                </tr>
            @endforeach
            </tbody>
        </table>

	</center>
  
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	</body>
</html>