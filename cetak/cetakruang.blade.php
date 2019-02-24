<html>
	<head>
		<title>Laporan Ruang Inventaris</title>
		<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	</head>

	<body>
	<center>
			<p>
				<h1>LAPORAN RUANG INVENTARIS</h1>	
			</p>
			</center>
		<hr>
	<center><b>Tabel Data Ruang Inventaris</b></center>
	<br>

	 <table class="table table-bordered table-striped" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruang</th>
                    <th>Kode Ruang</th>
                    <th>Keterangan</th>                    
                </tr>
            </thead>

            <tbody>
        @foreach($dataruang as $drr)
                <tr>
                    <td>{{$drr->id}}</td>
                    <td>{{$drr->nama_ruang}}</td>
                    <td>{{$drr->kode_ruang}}</td>
                    <td>{{$drr->keterangan}}</td>
               
                    
                </tr>
        @endforeach
            </tbody>
        </table>

	</center>
  
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	</body>
</html>