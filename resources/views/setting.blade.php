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
			<button onclick="window.location.href='/'" class="btn btn-primary">Home</button>
			<button onclick="window.location.href='/pengaturan'" class="btn btn-warning active">Setting</button>
		</div><br><br>

		<center><div class="btn-group btn-group-toggle" data-toggle="buttons">
		    <button class="btn btn-light" onclick="window.location.href='/provinsi'">Provinsi</button>
		    <button class="btn btn-light" onclick="window.location.href='/pilihan'">Pilihan</button>
		    <button class="btn btn-light" onclick="window.location.href='/lapak'">Lapak</button>
		    <button class="btn btn-light" onclick="window.location.href='/item'">Item</button>
		</center></div>
</div>
</body>
</html>
