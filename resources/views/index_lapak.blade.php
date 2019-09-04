<!DOCTYPE html>
<html>
<head>
	<title>Buka Diri</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">Data Lapak</h2>
		<div style="text-align: right">
			<button type="button" class="btn btn-primary">Home</button>
			<button type="button" class="btn btn-primary">Setting</button>
		</div>
		<div>
			<div class="btn-group btn-group-toggle" data-toggle="buttons">
  
			</div>
		</div>
		<hr>
		<div>
			<button type="button" class="btn btn-primary" id="buttonAdd">Tambah</button>
			<br><br>
			<span id="notif">
				
			</span>
		</div>
		<span id="form_result" style="margin: 2px;"></span>
		<br>
		<div style="text-align: center;">
			<table class="table table-bordered" id="myTable">
				<thead style="background-color: salmon;">
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
      								<td><input class="form-control input-lg" type="text" id="kode_lapak" name="kode_lapak" placeholder="Kode Lapak" required></td>
      							</tr>
      							<tr>
      								<td>Nama Lapak</td>
      								<td><input class="form-control input-lg" type="text" id="nama_lapak" name="nama_lapak" placeholder="Nama Lapak" required></td>
      							</tr>
      							<tr>
      								<td>Peringkat Lapak</td><td><input class="form-control input-lg" type="text" id="peringkat_lapak" name="peringkat_lapak" placeholder="Peringkat Lapak" required></td>
      							</tr>
      						</table>
      				</div>
	      			<div class="modal-footer">
				        <button type="submit" class="btn btn-warning" id="tombol_action">OK</button>
	      			</div>
    			</form>
   			 </div>
  		</div>
	</div> <!-- //penutup add -->

	<!-- Modal Detail -->
	<!-- <div id="myModalDetail" class="modal fade" tabindex="-1" role="dialog"
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
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      			</div>
    		</div>
 		</div>
	</div> --> <!-- penutup detail -->


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
			url: "/",
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

		if (action=="Tambah") {
			if (kode_lapak.length > 5 || kode_lapak.length < 5) {
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
							$("#formLapak")[0].reset();
							// $("#myTable").DataTable().ajax.reload();
						}
						$("#notif").html(html);
					}
				}); //tutup ajax
			}
		}

		//if edit
		if (action=="Edit") {
			if (kode_lapak.length > 5 || kode_lapak.length < 5) {
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
					$("#tombol_action").text('Update Data');
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
				$("#tombol_action").text('Update Data');
				$("#myModal").modal('show');
			}
		});
	});//penutup edit

	//delete(show modal)



}); //penutupreadyfunction
</script>
</html>