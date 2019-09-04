<!DOCTYPE html>
<html>
<head>
	<title>Master Provinsi</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
<div class="container">
		<h1 style="text-align: center;">DATA PROVINSI</h1>
		<div>
		<button type="button" class="btn btn-primary" data-toggle="modal" id="buttonAdd">
  Tambah Data</button>
 <!--  <button type="button" class="btn btn-primary" data-toggle="modal" id="buttonEdit">
  Edit Data</button>  -->
  <br><br>
  <span id="notif">
		  
	</span>
	</div>
	<br>
		<table class="table table-bordered" id="bioTable">
			<thead style="text-align: center;"> 
			<tr>
				<th rowspan="2">Kode Provinsi</th>
				<th rowspan="2">Nama Provinsi</th>
				<th rowspan="2">isDelete</th>
				<th colspan="3">Action</th>			
			</tr>
			<tr>
				<td>Edit</td>
				<td>Delete</td>
				<td>Detail</td>
				
			</tr>
			</thead>		
		</table>
	</div>

	<!-- modal tambah -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form id="formProviinsi">
    		@csrf
		      <div class="modal-header">
		        <h5 class="modal-title-add" id="exampleModalLabel">Tambah Data</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<input type="text" name="action" id="action">
		       <table>
		       	<tr>
		       		<td>Kode Provinsi</td>
		       		<td><input type="text" name="kode_pelajaran" id="kode_pelajaran" placeholder="Kode Pelajaran" required=""></td>
		       	</tr>
		       	<tr>
		       		<td>Nama Provinsi</td>
		       		<td><input type="text" name="nama_pelajaran" id="nama_pelajaran" placeholder="Nama Pelajaran" required=""></td>
		       	</tr>
		       	<tr>
		       		<td>Jumlah Kota Provinsi</td>
		       		<td><input type="text" name="jam_ajar" id="jam_ajar" placeholder="Jam Ajar" required=""></td>
		       	</tr>
		       </table>
		         </div>
			 	  <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		        <button type="submit" class="btn btn-primary" id="tombol_action">Save Change</button>
		      </div>
	    </form>
	 </div>
  </div>
</div> <!-- penutup modal tambah -->
</body>

</html>