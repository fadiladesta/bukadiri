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
			<button onclick="window.location.href='/'" class="btn btn-primary">Halaman Utama</button>
			<button onclick="window.location.href='/pengaturan'" class="btn btn-primary">Pengaturan</button>
		</div>

		<center><div class="btn-group btn-group-toggle" data-toggle="buttons">
		    <button class="btn btn-light" onclick="window.location.href='/provinsi'">Provinsi</button>
		    <button class="btn btn-light" onclick="window.location.href='/pilihan'">Pilihan</button>
		    <button class="btn btn-light" onclick="window.location.href='/lapak'">Lapak</button>
		    <button class="btn btn-success active" onclick="window.location.href='/'">Item</button>
		</div><hr><br></center>

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
		        <h5 class="modal-title-add" id="exampleModalLabel"></h5>
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
		        			<input class="form-control input-lg" type="text" id="kode_item" name="kode_item" placeholder="Masukkan Kode Item...">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td>Nama Item</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" id="nama_item" name="nama_item" placeholder="Masukkan Nama Item...">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td>Harga Item</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" id="harga_item" name="harga_item" placeholder="Masukkan Harga item...">
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Provinsi</td>
		        		<td>
		        			<select class="form-control input-lg" name="kode_provinsi" id="kode_provinsi">
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
		        			<select class="form-control input-lg" name="kode_pilihan" id="kode_pilihan">
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
		        			<select class="form-control input-lg" name="kode_lapak" id="kode_lapak">
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
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		        <button type="submit" id="tombol_act" class="btn btn-primary">Simpan</button>
		      </div>
		    </form>
	    </div>
	  </div>
	</div>

	<!-- Modal Detail -->
	<div class="modal fade" id="itemModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form id="formItem">
		      <div class="modal-header">
		        <h5 class="modal-title-detail" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<input class="form-control input-lg" type="hidden" name="action" id="action">

		        <table class="table">
		        	<tr>
		        		<td class="align-middle">Kode Item</td>
		        		<td id="kode_item_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle" >Nama Item</td>
		        		<td id="nama_item_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Harga Item</td>
		        		<td id="harga_item_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Provinsi</td>
		        		<td id="kode_provinsi_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Pilihan</td>
		        		<td id="kode_pilihan_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Lapak</td>
		        		<td id="kode_lapak_detail"></td>
		        	</tr>
		        </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		      </div>
		    </form>
	    </div>
	  </div>
	</div>

	<!-- Modal Delete -->
	<div class="modal fade" id="itemModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- <input type="text" name="action" id="action"><br><br> -->
		        <h4 class="modal-title" style="text-align: center;">Anda yakin ingin menghapus data ini?</h4>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		        <button type="submit" id="tombol_delete" class="btn btn-danger"></button>
		      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal Aktif -->
	<div class="modal fade" id="itemModalAktif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- <input type="text" name="action" id="action"><br><br> -->
		        <h4 class="modal-title" style="text-align: center;">Anda yakin ingin mengaktifkan data ini?</h4>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		        <button type="submit" id="tombol_aktif" class="btn btn-primary"></button>
		      </div>
	    </div>
	  </div>
	</div>

</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#buttonTambah').click(function(){
			$('.modal-title-add').text('Tambah Data');
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
 				url: "/item",
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
			var action 			= $("#action").val(); // get value
			var kode_item 		= $("#kode_item").val();
			var nama_item 		= $("#nama_item").val();
			var harga_item 		= $("#harga_item").val();
			var kode_provinsi 	= $("#kode_provinsi").val();
			var kode_pilihan 	= $("#kode_pilihan").val();
			var kode_lapak 		= $("#kode_lapak").val();
			if (action == "tambah") {
				if (kode_item == "") {
					alert('Kode Item tidak boleh kosong');
				}else if (kode_item.length > 5 || kode_item.length < 5) {
					alert('Karakter harus 5 digit');
				}else if (nama_item == "") {
					alert('Nama Item tidak boleh kosong');
				}else if (harga_item == "") {
					alert('Harga item tidak boleh kosong');
				}else if (kode_provinsi == "") {
					alert('Kode provinsi tidak boleh kosong');
				}else if (kode_pilihan == "") {
					alert('Kode pilihan tidak boleh kosong');
				}else if (kode_lapak == "") {
					alert('Kode lapak tidak boleh kosong');
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
								// $("#formItem")[0].reset();
								$("#tableItem").DataTable().ajax.reload();
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
				if (kode_item == "") {
					alert('Kode Item tidak boleh kosong');
				}else if (kode_item.length > 5 || kode_item.length < 5) {
					alert('Karakter harus 5 digit');
				}else if (nama_item == "") {
					alert('Nama Item tidak boleh kosong');
				}else if (harga_item == "") {
					alert('Harga item tidak boleh kosong');
				}else if (kode_provinsi == "") {
					alert('Kode provinsi tidak boleh kosong');
				}else if (kode_pilihan == "") {
					alert('Kode pilihan tidak boleh kosong');
				}else if (kode_lapak == "") {
					alert('Kode lapak tidak boleh kosong');
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
								$("#tableItem").DataTable().ajax.reload();
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
					$('.modal-title-add').text('Ubah Data');
					$('#tombol_act').text('Ubah Data');
					$("#itemModal").modal("show");
		});

		$(document).on('click','.lihat',function(){
			var id = $(this).attr('id');
			// alert(id);
			$.ajax({
				url:"/item/lihat/"+id,
				dataType: "json",
				success:function(html){
					$("#kode_item_detail").text(html.data[0].kode_item);
					$("#nama_item_detail").text(html.data[0].nama_item);
					$("#harga_item_detail").text(html.data[0].harga_item);
					$("#kode_provinsi_detail").text(html.data[0].kode_provinsi);
					$("#kode_pilihan_detail").text(html.data[0].kode_pilihan);
					$("#kode_lapak_detail").text(html.data[0].kode_lapak);

				}
			});
					$('.modal-title-detail').text('Lihat Data');
					$("#itemModalDetail").modal("show");
		});

		// delete
		var id_delete;
		$(document).on('click','.hapus',function(){
			id_delete = $(this).attr('id');
			// $('.modal-title-delete').text('');
			$('#tombol_delete').text('Hapus Data');
			$('#itemModalDelete').modal('show');
		});

		// action delete
		$("#tombol_delete").click(function(){
			$.ajax({
				url:"/item/hapus/"+id_delete,
				beforeSend:function(){
					$("#tombol_delete").text('Menghapus...');
				},
				success:function(){
					setTimeout(function(){
						$("#itemModalDelete").modal('hide');
						$("#tombol_delete").text('OK');
						$("#tableItem").DataTable().ajax.reload();
					},500);
				}
			});
		});

		// aktif
		var id_aktif;
		$(document).on('click','.aktif',function(){
			id_aktif = $(this).attr('id');
			// $('.modal-title-aktif').text('');
			$('#tombol_aktif').text('Aktifkan Data');
			$('#itemModalAktif').modal('show');
		});

		// action Aktif
		$("#tombol_aktif").click(function(){
			$.ajax({
				url:"/item/aktif/"+id_aktif,
				beforeSend:function(){
					$("#tombol_aktif").text('Mengaktifkan...');
				},
				success:function(){
					setTimeout(function(){
						$("#itemModalAktif").modal('hide');
						$("#tombol_aktif").text('OK');
						$("#tableItem").DataTable().ajax.reload();
					},500);
				}
			});
		});
	});
</script>
</html>