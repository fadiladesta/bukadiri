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
		<table class="table table-bordered" id="myTable">
			<thead style="text-align: center;"> 
			<tr style="background-color: lightgreen;">
				<th>Kode Provinsi</th>
				<th>Nama Provinsi</th>
				<th>Status</th>	
				<th>Lihat</th>
				<th>Ubah</th>
				<th>Hapus</th>		
			</tr>
			</thead>		
		</table>
	</div> <!-- penutup kontainer -->

<!-- modal tambah -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form id="formProvinsi">
    		@csrf
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<input type="text" name="action" id="action">
		       <table>
		       	<tr>
		       		<td>Kode Provinsi</td>
		       		<td><input type="text" name="kode_provinsi" id="kode_provinsi" placeholder="Kode Provinsi" required=""></td>
		       	</tr>
		       	<tr>
		       		<td>Nama Provinsi</td>
		       		<td><input type="text" name="nama_provinsi" id="nama_provinsi" placeholder="Nama Provinsi" required=""></td>
		       	</tr>
		       	<tr>
		       		<td>Jumlah Kota Provinsi</td>
		       		<td><input type="text" name="jumlah_kota_provinsi" id="jumlah_kota_provinsi" placeholder="Jumlah Kota Provinsi" required=""></td>
		       	</tr>
		       </table>
		         </div>
			 	  <div class="modal-footer">
		        <button type="submit" class="btn btn-primary" id="tombol_action">Save Change</button>
		      </div>
	    </form>
	 </div>
  </div>
</div> <!-- penutup modal tambah -->

</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#buttonAdd").click(function(){  //klik buttonAdd
			$(".modal-title").text('Tambah Data Provinsi'); //muncul title modal
			$("#tombol_action").text('OK'); //nama tombol
			$("#action").val('Tambah') //set value di id:action
			$("#myModal").modal('show'); //menampilkan modal
		});

		//klik submit
		$("#formProvinsi").on('submit',function(e){
			e.preventDefault();
			var action= $("#action").val(); //get value
			var kode_provinsi = $("#kode_provinsi").val();
			
			if (action=='Tambah') { //ketika action tambah tambah
				//alert("ajax untuk tambah");
				if (kode_provinsi.length > 5 || kode_provinsi.length <5) {
					alert('karakter harus 5 digit');

				}else{
					$.ajax({
					url: "/provinsi/add",
					method: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					dataType: "json",
					success: function(data){
						var html ='';
						$("#myModal").modal('hide');
						if (data.errors) {
						 html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> Data Sudah Ada! </strong>'+data.errors+' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';	
						}
						//$("#notif").html(html);
						if (data.success) {
							html ='<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong> Selamat! </strong>'+data.success+' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';							
							$("#formProvinsi")[0].reset();
							$("#myTable").DataTable().ajax.reload();
						}						
							$("#notif").html(html);					
						}
				}); //penutup
				}
			} //if tambah
		});
		
		$("#myTable").DataTable({ //setting pada kolom pada table untuk dapat diurutkan
			processing: true,
			serverside: true,
			ajax:{
				url:"/provinsi",
			},
			columns:[
				{
					data: 'kode_provinsi',
					name: 'kode_provinsi'
				},
				{
					data: 'nama_provinsi',
					name: 'nama_provinsi'
				},
				{
					data: 'isdelete',
					name: 'isdelete',
					orderable: false
				},
				{
					data: 'lihat', //samakan dengan @index di controller
					name: 'lihat',
					orderable: false
				},
				{
					data: 'ubah',
					name: 'ubah',
					orderable: false
				},
				{
					data: 'hapus',
					name: 'hapus',
					orderable: false
				},
				
							
			]
		}); //penutup

		$(document).on('click','.edit',function(){
			var id = $(this).attr('id');
			$.ajax({
				url:"/provinsi/edit/"+id,
				dataType:"json",
				success:function(ubah){
					$("#kode_provinsi").val(ubah.data[0].kode_provinsi); //data[0] artinya array dari data ke 0
					$("#nama_provinsi").val(ubah.data[0].nama_provinsi);
					$("#jumlah_kota_provinsi").val(ubah.data[0].jumlah_kota_provinsi);

					$(".modal-title").text('Edit Data Provinsi'); //set title popup
					$("#tombol_action").text('Edit'); //set nama tombol dari id tombol_action
					$("#action").val('Update Data'); //sett value pada input dengan id action
					$("#myModal").modal('show'); //menampilkan modal

				}
			}); //penutup ajax

		}); //penutup edit

		//update
		$("#formProvinsi").on('submit',function(e){
			e.preventDefault();
			var action= $("#action").val(); //get value
			var kode_provinsi = $("#kode_provinsi").val();
			
			if (action=='Update Data') { //jika action = update data
				//alert("ajax untuk tambah");
				if (kode_provinsi.length > 5 || kode_provinsi.length <5) {
					alert('karakter harus 5 digit');

				}else{
					$.ajax({
					url: "/provinsi/update",
					method: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					dataType: "json",
					success: function(data){
						var html ='';
						$("#myModal").modal('hide');
						if (data.errors) {
						 html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> Data Sudah Ada! </strong>'+data.errors+' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';	
						}
						//$("#notif").html(html);
						if (data.success) {
							html ='<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong> Selamat! </strong>'+data.success+' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';							
							$("#formProvinsi")[0].reset();
							$("#myTable").DataTable().ajax.reload();
						}						
							$("#notif").html(html);					
						}
				}); //penutup
				}
			} //if tambah
		});

	});
</script>
</html>