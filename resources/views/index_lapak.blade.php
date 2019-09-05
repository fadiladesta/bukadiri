<!DOCTYPE html>
<html>
<head>
	<title>Buka Diri</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
	<style type="text/css">
		div#myTable_length{
			text-align: left;
		}
		div#myTable_info{
			text-align: left;
		}
	</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
	<div class="container">
		<center><img src="logobukadiri.jpg" width="30%" height="30%"></center>
		<div style="text-align: right">
			<button type="button" class="btn btn-primary" onclick="window.location.href='/'">Halaman Utama</button>
			<button type="button" class="btn btn-primary" onclick="window.location.href='/pengaturan'">Pengaturan</button>
		</div>
		<div>
			<center><div class="btn-group btn-group-toggle" data-toggle="buttons">
				<button class="btn btn-light btn-sm" onclick="window.location.href='/provinsi'">Provinsi</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/pilihan'">Pilihan</button>
		    <button class="btn btn-success btn-sm active" onclick="window.location.href='/lapak'">Lapak</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/item'">Item</button>
			</div></center>
		</div>
		<hr>
		<div>
			<h4 style="text-align: center;">Data Lapak</h4>
			<button type="button" class="btn btn-primary" id="buttonAdd">Tambah</button>
			<br><br>
			<span id="notif">
				
			</span>
		</div>
		<br>
		<div style="text-align: center;">
			<table class="table table-bordered" id="myTable">
				<thead style="background-color: crimson; color: white;">
					<tr>
						<th>Kode Lapak</th>
						<th>Nama Lapak</th>
						<th>Status</th>
						<th>Lihat</th>
						<th>Ubah</th>
						<th>Hapus</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

	<!-- Modal Add -->
	<div class="modal" id="myModal"tabindex="-1" role="dialog">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<form id="formLapak">
    				@csrf
      				<div class="modal-header">
        				<h5 class="modal-title-add">Input Data Lapak</h5>
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        			</button>
      				</div>
      				<div class="modal-body">
      					<input type="hidden" name="action" id="action">
      						<table class="table">
      							<tr>
      								<td>Kode Lapak</td>
      								<td><input class="form-control input-lg" type="text" id="kode_lapak" name="kode_lapak" placeholder="Kode Lapak"></td>
      							</tr>
      							<tr>
      								<td>Nama Lapak</td>
      								<td><input class="form-control input-lg" type="text" id="nama_lapak" name="nama_lapak" placeholder="Nama Lapak"></td>
      							</tr>
      							<tr>
      								<td>Peringkat Lapak</td><td><input class="form-control input-lg" type="text" id="peringkat_lapak" name="peringkat_lapak" placeholder="Peringkat Lapak"></td>
      							</tr>
      						</table>
      				</div>
	      			<div class="modal-footer">
	      				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				        <button type="submit" class="btn btn-primary" id="tombol_action">Simpan</button>
	      			</div>
    			</form>
   			 </div>
  		</div>
	</div> <!-- //penutup add -->

	<!-- Modal Detail -->
	<div id="myModalDetail" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
	       		<h5 class="modal-title" id="exampleModalLabel">Detail Lapak</h5>
	       		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
       		 	</button>
        	</div>
      		<div class="modal-body">
      			<input type="hidden" name="id_edit" id="id_edit">
				<table class="table">
					<tr>
						<td>Kode Lapak</td>
						<td id="kode_lapak_detail"></td>
					</tr>
					<tr>
						<td>Nama Lapak</td>
						<td id="nama_lapak_detail"></td>
					</tr>
					<tr>
						<td>Peringkat Lapak</td>
						<td id="peringkat_lapak_detail"></td>
					</tr>
				</table>
     		 </div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      			</div>
    		</div>
 		</div>
	</div> <!-- penutup detail -->

	<!-- Modal Popup untuk Delete -->
<div class="modal fade" id="modal_delete">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<h4 class="modal-title" style="text-align: center;"> Yakin mau dihapus ?</h4>					
			</div>
			<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button class="btn btn-danger" id="delete_button">Hapus Data</button>
			</div>
		</div>	
	</div>
</div>

<!-- Modal Popup untuk Aktif -->
<div class="modal fade" id="modal_aktif">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<h4 class="modal-title" style="text-align: center;"> Anda yakin ingin mengaktifkan data ini ?</h4>					
			</div>
			<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button class="btn btn-primary" id="actived_button">Aktifkan</button>
			</div>
		</div>	
	</div>
</div>

</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#buttonAdd").click(function(){
			$(".modal-title-add").text('Tambah Data');
			$("#tombol_action").text('OK');
			$("#action").val('Tambah');
			$("#myModal").modal('show');
		});

	$('#myModal').on('hidden.bs.modal', function(e){
		$("#kode_lapak").attr('readonly', false).val('');
		$("#nama_lapak").val('');
		$("#peringkat_lapak").val('');
	});

	$("#myTable").DataTable({
		processing : true,
		serverside : true,
		ajax:{
			url: "/lapak",
		},
		columns:[
			{
				data: 'kode_lapak', 
				name: 'kode_lapak' 
			},
			{
				data: 'nama_lapak', 
				name: 'nama_lapak' 
			},
			{
				data: 'status', 
				name: 'status',
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
			}

		]

	});

	$("#formLapak").on('submit', function(e){
		e.preventDefault();
		var action = $("#action").val();
		var kode_lapak = $("#kode_lapak").val();
		var nama_lapak = $("#nama_lapak").val();
		var peringkat_lapak = $("#peringkat_lapak").val();
		if (action=="Tambah") {
			if (nama_lapak == "") {
				alert('Nama Lapak tidak boleh kosong!');
			}else if (kode_lapak == ""){
				alert('Kode Lapak tidak boleh kosong!');
			}else if (peringkat_lapak == "") {
				alert('Peringkat Lapak tidak boleh kosong!');
			}else if (kode_lapak.length > 5 || kode_lapak.length < 5 ) {
				alert('Karakter harus 5 digit!');
			}else{
				$.ajax({
					url:"/lapak/add",
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
							html = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!</strong>'+data.errors+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
						if (data.success) {
							html = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat!</strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							//$("#formLapak")[0].reset();
							$("#myTable").DataTable().ajax.reload();
						}
						$("#notif").html(html);
					}
				}); //tutup ajax
			}
		}

		//if edit
		if (action=="Edit") {
			if (nama_lapak == "") {
				alert('Nama Lapak tidak boleh kosong!');
			}else if (kode_lapak == ""){
				alert('Kode Lapak tidak boleh kosong!');
			}else if (peringkat_lapak == "") {
				alert('Peringkat Lapak tidak boleh kosong!');
			}else if (kode_lapak.length > 5 || kode_lapak.length < 5 ) {
				alert('Karakter harus 5 digit!');
			}else{
				$.ajax({
				url:"/lapak/update/",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				dataType: "json",
				success:function(data){
					var html ='';
					$("#myModal").modal('hide');
					if (data.errors) {
						html = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!</strong>'+data.errors+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
					}
					if (data.success) {
						html = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat!</strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						// $("#formPelajaran")[0].reset();
						$("#myTable").DataTable().ajax.reload();
					}
					$("#notif").html(html);
					}
				}); //penutup ajax
			}
		}
	});

	//pop detail
	$(document).on('click','.lihat',function(){
		var id = $(this).attr('id');
		// alert(id);
		$.ajax({
			url:"/lapak/lihat/"+id,
			dataType: "json",
			success: function(html){
					console.log(html);
					$("#kode_lapak_detail").text(html.data[0].kode_lapak);
					$("#nama_lapak_detail").text(html.data[0].nama_lapak);
					$("#peringkat_lapak_detail").text(html.data[0].peringkat_lapak);
					$("#tombol_action").text('Ubah Data');
					$("#myModalDetail").modal('show');
			}
		});
	});//penutup detail

	//edit
	$(document).on('click','.ubah',function(){
	var id = $(this).attr('id');
	// alert(id);
		$.ajax({
			url:"/lapak/edit/"+id,
			dataType: "json",
			success: function(html){
				$("#kode_lapak").attr('readonly', true).val(html.data[0].kode_lapak);
				$("#nama_lapak").val(html.data[0].nama_lapak);
				$("#peringkat_lapak").val(html.data[0].peringkat_lapak);
				$("#action").val('Edit');
				$(".modal-title-add").text('Ubah Data');
				$("#tombol_action").text('Ubah Data');
				$("#myModal").modal('show');
			}
		});
	});//penutup edit

	//delete(show modal)
	var id_delete;
	$(document).on('click','.hapus',function(){
		id_delete = $(this).attr("id");
		$("#modal_delete").modal('show');
	});//penutup delete(show modal)

	//action delete
	$("#delete_button").click(function(){
		$.ajax({
		url:"/lapak/hapus/"+id_delete,
		beforeSend:function(){
			$("#delete_button").text('Deleting...');
		},
			success:function(){
				setTimeout(function(){
					$("#modal_delete").modal('hide');
					$("#delete_button").text('OK');
					$("#myTable").DataTable().ajax.reload();
				},500);
			}
		});
	});
	//aktif(show modal)
	var aktif;
	$(document).on('click','.status',function(){
		aktif = $(this).attr("id");
		$("#modal_aktif").modal('show');
	});//penutup aktif(show modal)

	//action aktif
	$("#actived_button").click(function(){
		$.ajax({
		url:"/lapak/status/"+aktif,
		beforeSend:function(){
			$("#actived_button").text('Actived...');
		},
			success:function(){
				setTimeout(function(){
					$("#modal_aktif").modal('hide');
					$("#actived_button").text('OK');
					$("#myTable").DataTable().ajax.reload();
				},500);
			}
		});
	});
});//tutup function

</script>
</html>