<!DOCTYPE html>
<html>
<head>
	<title>Master Provinsi</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
	<style type="text/css">
		table{
			text-align: center;
		}
	</style>

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
<div class="container">
		
	<div style="text-align: right;">
			<center><img src="logobukadiri.jpg" width="30%" height="30%"></center>
			<button class="btn btn-primary" onclick="window.location.href='/'">Halaman Utama</button>
			<button class="btn btn-primary" onclick="window.location.href='/'">Pengaturan</button>
	</div>

	<center><div class="btn-group btn-group-toggle" data-toggle="buttons" >
		    <button class="btn btn-success btn-sm active" onclick="window.location.href='/provinsi'">Provinsi</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/pilihan'">Pilihan</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/lapak'">Lapak</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/item'">Item</button>
			</div></center><br>
		<h3 style="text-align: center;">DATA PROVINSI</h3>
		<div>
		<button type="button" class="btn btn-primary" data-toggle="modal" id="buttonAdd">
  Tambah</button>
 <!--  <button type="button" class="btn btn-primary" data-toggle="modal" id="buttonEdit">
  Edit Data</button>  -->
  <br><br>
 	 <span id="notif">
		   
	</span>
		</div>
	<br>
		<table class="table table-bordered" id="myTable">
			<thead style="text-align: center;"> 
			<tr style="background-color: crimson;">
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
		      	<input type="hidden" name="action" id="action">
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
			 	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		        <button type="submit" class="btn btn-primary" id="tombol_action">Save Change</button>
		      </div>
	    </form>
	 </div>
  </div> 
</div> <!-- penutup modal tambah -->

<!-- Modal Detail -->
<div id="myModalDetail" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="formProvinsi">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title-detail">Detail Data Provinsi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>	
					 <span aria-hidden="true">&times;</span>		
				</div>
				<div class="modal-body">
					<input type="hidden" name="action" id="action">
					<table>
						<tr>
							<td>Kode Provinsi</td>
							<td id="kode_provinsi_detail"></td>
						</tr>
						<tr>
							<td>Nama Provinsi</td>
							<td id="nama_provinsi_detail"></td>
						</tr>
						<tr>
							<td>Jumlah Kota Provinsi</td>
							<td id="jumlah_kota_provinsi_detail"></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<!--<button type="button" class="btn btn-secondary">close</button> -->
					 <button type="submit" class="btn-primary" id="tombol_action">OK</button> 
 				</div>
			</form>		
		</div>	
	</div>	
</div> <!-- penutup modal detail -->

<!-- Modal Hapus -->
<div class="modal fade" id="myModalDelete">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 100px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button> 
			</div>
				<div class="modal-body">
					<h4 class="modal-title-hapus" style="text-align: center;">Hapus Data?</h4>
				</div>			
				<div class="modal-footer" style="margin: 0px; border-top:0px; text-align:center;">
				<button class="btn btn-danger" id="delete_button">Hapus</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div> <!-- penutup -->

<!-- Modal popup untuk Aktif -->
<div class="modal fade" id="modal_aktif">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 100px">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
			</button> 
			</div>
			<div class="modal-body">
			<h4 class="modal-title-aktif" style="text-align: center;">Aktifkan?</h4>
			</div>			
			<div class="modal-footer" style="margin: 0px; border-top:0px; text-align:center;">
				<button class="btn btn-danger" id="aktif_button">Aktif</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div> <!-- penutup modal aktif -->


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
					data: 'lihat', 
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

        //detail
		$(document).on('click','.detail',function(){
			var id = $(this).attr('id');
			$.ajax({
				url:"/provinsi/detail/"+id,
				dataType:"json",
				success:function(detail){ //detail didini adalah variable
					$("#kode_provinsi_detail").text(detail.data[0].kode_provinsi);
					$("#nama_provinsi_detail").text(detail.data[0].nama_provinsi);
					$("#jumlah_kota_provinsi_detail").text(detail.data[0].jumlah_kota_provinsi);
					
					$("#myModalDetail").modal('show');


				}
			});
		});


		var hapus;
		$(document).on('click','.delete',function(){
			hapus = $(this).attr('id');
			$("#myModalDelete").modal('show');
		});

		$("#delete_button").click(function(){
			$.ajax({
				url:"/provinsi/hapus/"+hapus,
				beforesend:function(){
					$("#delete_button").text('Sedang menghapus...');
				},
				success:function(){
					setTimeout(function(){
						$("#myModalDelete").modal('hide');
						$("#delete_button").text('Ok');
						$("#myTable").DataTable().ajax.reload();
					},500);
				}
			});
		});

		var aktif;
		$(document).on('click','.aktif',function(){
			aktif = $(this).attr('id');
			//alert(id);
			$("#modal_aktif").modal('show');
		});//penutup delete
		//action delete
		$("#aktif_button").click(function(){
			$.ajax({
				url:"/provinsi/aktif/"+aktif,
				beforeSend:function(){
					$("#aktif_button").text('Mengaktifkan...');

				},
				success:function(){
					setTimeout(function(){
						$("#modal_aktif").modal('hide');
						$("#aktif_button").text('Ok');
						$("#myTable").DataTable().ajax.reload();
					},500);
				}
			});
		});

	});
</script>
</html>