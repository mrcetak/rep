<html>
	<head>
		<title>Laporan Jenis Inventaris</title>
		<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	</head>

	<body>
	<center>
			<p>
				<h1>LAPORAN JENIS INVENTARIS</h1>	
			</p>
			</center>
		<hr>
	<center><b>Tabel Data Jenis Inventaris</b></center>
	<br>

	 <table class="table table-bordered table-striped" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jenis</th>
                    <th>Kode Jenis</th>
                    <th>Keterangan</th>                    
                </tr>
            </thead>

            <tbody>
        @foreach($datajenis as $djj)
                <tr>
                    <td>{{$djj->id}}</td>
                    <td>{{$djj->nama_jenis}}</td>
                    <td>{{$djj->kode_jenis}}</td>
                    <td>{{$djj->keterangan}}</td>
               
                    
                </tr>
        @endforeach
            </tbody>
        </table>

	</center>
  
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	</body>
</html>