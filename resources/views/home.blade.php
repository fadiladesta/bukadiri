<!DOCTYPE html>
<html>
<head>
	<title>Bukadiri</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">

	<style type="text/css">
		th{
			background-color: crimson;
			color: white;
		}
	</style>


	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
	<div class="container">
		<center><img src="logobukadiri.jpg" width="30%" height="30%"></center>
		<div style="text-align: right;">
			<button onclick="window.location.href='/'" class="btn btn-warning active">Home</button>
			<button onclick="window.location.href='/pengaturan'" class="btn btn-primary">Setting</button>
		</div><br><br>

		<table id="tableHome" class="table table-bordered table-hovered" style="text-align: center;" id="tableHome">
			<thead>
				<tr>
					<th>Nama Item</th>
					<th>Harga Item</th>
					<th>Nama Provinsi</th>
					<th>Nama Pilihan</th>
					<th>Nama Lapak</th>
				</tr>
			</thead>
		</table>
	<!-- Div Container -->	
	</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$('#tableHome').DataTable({
 			processing : true,
 			serverside : true,
 			ajax:{
 				url: "/",
 			},
 			columns:[
 				{
 					data : 'nama_item',
 					name : 'nama_item'
 				},
 				{
 					data : 'harga_item',
 					name : 'harga_item'
 				},
 				{
 					data : 'nama_provinsi',
 					name : 'nama_provinsi'
 				},
 				{
 					data : 'nama_pilihan',
 					name : 'nama_pilihan'
 				},
 				{
 					data : 'nama_lapak',
 					name : 'nama_lapak'
 				}
 			]
 		});
	});
</script>
</html>