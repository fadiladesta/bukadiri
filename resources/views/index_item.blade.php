<!DOCTYPE html>
<html>
<head>
	<title>Bukadiri</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">BUKADIRI</h2><hr>
		<div style="text-align: right;">
			<button class="btn btn-primary active">Home</button>
			<button class="btn btn-primary">Setting</button>
		</div>

		<div class="btn-group btn-group-toggle" data-toggle="buttons">
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/provinsi'">Provinsi</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/provinsi'">Pilihan</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/provinsi'">Lapak</button>
		    <button class="btn btn-success btn-sm active" onclick="window.location.href='/'">Item</button>
		</div><hr><br>

		<h4 style="text-align: center">Data Item</h4>
		<button type="button" id="buttonTambah" class="btn btn-info">Tambah Data</button><br><br>

		<span id="notif"></span>

		<table class="table table-bordered table-hovered" style="text-align: center;" id="tableItem">
			<thead>
				<tr>
					<th>Kode Item</th>
					<th>Nama Item</th>
					<th>Status</th>
					<th>Lihat</th>
					<th>Ubah</th>
					<th>Hapus</th>
				</tr>
			</thead>
		</table>
	<!-- Div Container -->	
	</div>

	<!-- Modal Tambah+Ubhah -->
	<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form id="formItem">
	      	@csrf
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<input class="form-control input-lg" type="hidden" name="action" id="action">

		        <table class="table">
		        	<tr>
		        		<td>Kode Item</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" id="kode_item" name="kode_item" placeholder="Masukkan Kode Item..." required="">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td>Nama Item</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" id="nama_item" name="nama_item" placeholder="Masukkan Nama Item..." required="">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td>Harga Item</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" id="harga_item" name="harga_item" placeholder="Masukkan Harga item..." required="">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Provinsi</td>
		        		<td>
		        			<select class="form-control input-lg" name="kode_provinsi" id="kode_provinsi" required="">
		        				<option value="">Pilih Provinsi..</option>
		        				@foreach($provinsis as $provinsi) <!-- perulangan array -->
									<option value="{{ $provinsi->kode_provinsi }}">{{ $provinsi->kode_provinsi }}</option>
								@endforeach
		        			</select>
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Pilihan</td>
		        		<td>
		        			<select class="form-control input-lg" name="kode_pilihan" id="kode_pilihan" required="">
		        				<option value="">Pilih Pilihan..</option>
		        				@foreach($pilihans as $pilihan) <!-- perulangan array -->
									<option value="{{ $pilihan->kode_pilihan }}">{{ $pilihan->kode_pilihan }}</option>
								@endforeach
							</select>
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Lapak</td>
		        		<td>
		        			<select class="form-control input-lg" name="kode_lapak" id="kode_lapak" required="">
		        				<option value="">Pilik Lapak..</option>
		        				@foreach($lapaks as $lapak) <!-- perulangan array -->
									<option value="{{ $lapak->kode_lapak }}">{{ $lapak->kode_lapak }}</option>
								@endforeach
							</select>
		        		</td>
		        	</tr>
		        </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" id="tombol_act" class="btn btn-primary">Save changes</button>
		      </div>
		    </form>
	    </div>
	  </div>
	</div>

</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#buttonTambah').click(function(){
			$('.modal-title').text('Input Data');
			$('#action').val('tambah');
			$('#tombol_act').text('Tambah');
			$('#kode_item').attr('readonly', false);
			$('#itemModal').modal('show');
		});

		$('#itemModal').on('hidden.bs.modal', function(e){
			$("#formItem")[0].reset();	
		});

		$('#tableItem').DataTable({
 			processing : true,
 			serverside : true,
 			ajax:{
 				url: "/",
 			},
 			columns:[
 				{
 					data : 'kode_item',
 					name : 'kode_item'
 				},
 				{
 					data : 'nama_item',
 					name : 'nama_item'
 				},
 				{
 					data : 'status',
 					name : 'status',
 					orderable : false
 				},
 				{
 					data : 'lihat',
 					name : 'lihat',
 					orderable : false
 				},
 				{
 					data : 'ubah',
 					name : 'ubah',
 					orderable : false
 				},
 				{
 					data : 'hapus',
 					name : 'hapus',
 					orderable : false
 				}
 			]
 		});

		$("#formItem").on("submit", function(e){
			event.preventDefault();
			var action = $("#action").val(); // get value
			var kode_item = $("#kode_item").val();
			if (action == "tambah") {
				if (kode_item.length > 5 || kode_item.length < 5) {
					alert('Karakter harus 5 digit');
				}else{
					$.ajax({
						url:"/item/tambah",
						method:"POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						dataType: "json",
						success:function(data){
							var html ='';
							$("#itemModal").modal('hide');
							if (data.success) {
								html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat! </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#formItem")[0].reset();
								// $("#formPelajaran").DataTable().ajax.reload();
							}
							if (data.error) {
								html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							}
							$("#notif").html(html);
						}
					});					
				}
			};

			if (action == "ubah") {
				if (kode_item.length > 5 || kode_item.length < 5) {
					alert('Karakter harus 5 digit');
				}else{
					$.ajax({
						url:"/item/update",
						method:"POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						dataType: "json",
						success:function(data){
							var html ='';
							$("#itemModal").modal('hide');
							if (data.success) {
								html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat! </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#formItem")[0].reset();
							}
							if (data.error) {
								html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							}
							$("#notif").html(html);
						}
					});					
				}
			}
		});

		// ubah
		$(document).on('click','.ubah',function(){
			var id = $(this).attr('id');
			// alert(id);
			$.ajax({
				url:"/item/ubah/"+id,
				dataType: "json",
				success:function(html){
					$("#kode_item").val(html.data[0].kode_item);
					$("#nama_item").val(html.data[0].nama_item);
					$("#harga_item").val(html.data[0].harga_item);
					$("#kode_provinsi").val(html.data[0].kode_provinsi);
					$("#kode_pilihan").val(html.data[0].kode_pilihan);
					$("#kode_lapak").val(html.data[0].kode_lapak);

				}
			});
					$('#kode_item').attr('readonly', true);
					$('#action').val('ubah');
					$('.modal-title').text('Edit Data');
					$('#tombol_act').text('Update Data');
					$("#itemModal").modal("show");
		});
	});
</script>
</html>