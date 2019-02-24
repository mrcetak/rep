<html>
	<head>
		<title>Laporan Pegawai</title>
		<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	</head>

	<body>
	<center>
			<p>
				<h1>LAPORAN PEGAWAI</h1>	
			</p>
			</center>
		<hr>
	<center><b>Tabel Data Pegawai</b></center>
	<br>

	 <table class="table table-bordered table-striped" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Kode Pegawai</th>
                    <th>Keterangan</th>                   
                </tr>
            </thead>

            <tbody>
        @foreach($datapegawai as $dp)
                <tr>
                    <td>{{$dp->id}}</td>
                    <td>{{$dp->nama_pegawai}}</td>
                    <td>{{$dp->nip}}</td>
                    <td>{{$dp->alamat}}</td> 
                </tr>
        @endforeach
            </tbody>
        </table>

	</center>
  
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	</body>
</html>