<!DOCTYPE html>
<html>
<head>
	<title>Pilihan</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
	<style type="text/css">
		a:link{
 			color:white;
 		}
 		a:visited{
 			color: blue;
 		}
 		a:hover{
 			color: red;	
 		}
		table {
		font-family: sans-serif;
		color: #444;
		border-collapse: collapse;
		width: 50%;
		border: 1px solid #f2f5f7;
		text-align: center;
		}
		table th{
			background-color: lightblue;
			text-align: center;
		}
		body {
			 background-image: url("asd.png");
			  background-repeat: no-repeat;
			  background-size: cover;
  			background-color: #cccccc;
		}

	</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<h1 style="text-align: center;">Data Pilihan</h1>
		<hr>
		<!-- button add -->
		<div>
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="buttonAdd">Tambah</button><br><br>
		</div> <!-- tutup button -->
		<span id="notif">
		</span>
	</div>

<!-- awal table -->
<table class="table table-stripped table-hover" id="pilihanTable">
	<div class="container">
		<thead>
			<tr>
				<th rowspan="2">Kode Pilihan</th>
				<th rowspan="2">Nama Pilihan</th>
				<th rowspan="2" >Status</th>
				<th colspan="4">Aksi</th>
			</tr>
			<tr>
				<th>Lihat</th>
				<th>Ubah</th>
				<th>Hapus</th>
			</tr>
		</thead>
	</div>
	
</table> <!-- akhir table -->


	

</body>
</html>