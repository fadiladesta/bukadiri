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
 		table{
 			text-align: center;
 		}

 		thead{
 			background: crimson;
 			color: white
 		}

	</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
<div class="container">
	<center><img src="logobukadiri.png" width="30%" height="30%"></center>
		<div style="text-align: right;">
			<button onclick="window.location.href='/'" class="btn btn-primary">Halaman Utama</button>
			<button onclick="window.location.href='/'" class="btn btn-primary">Pengaturan</button>
		</div>

		<center><div class="btn-group btn-group-toggle" data-toggle="buttons">
		    <button class="btn btn-light " onclick="window.location.href='/provinsi'">Provinsi</button>
		    <button class="btn btn-success  active" onclick="window.location.href='/pilihan'">Pilihan</button>
		    <button class="btn btn-light " onclick="window.location.href='/lapak'">Lapak</button>
		    <button class="btn btn-light " onclick="window.location.href='/item'">Item</button>
		</div></center><hr><br>
		<h1 style="text-align: center;">Data Pilihan</h1>
		<!-- button add -->
<<<<<<< HEAD
		<button type="button" class="btn btn-primary" data-toggle="modal" id="buttonAdd">
  Tambah</button><br><br>
=======
		<button type="button" class="btn btn-primary " data-toggle="modal" id="buttonAdd">Tambah</button><br><br>
>>>>>>> 644e79e54ee7780dea6dc72b8420c25f59dda459
		<span id="notif">
		</span>

<!-- awal table -->
<table class="table table-stripped table-hover" id="tablePilihan">
		<thead>
			<tr>
				<th>Kode Pilihan</th>
				<th>Nama Pilihan</th>
				<th>Status</th>
				<th>Lihat</th>
				<th>Ubah</th>
				<th>Hapus</th>
			</tr>
		</thead>
</table> <!-- akhir table -->
</div> <!-- tutup div container -->

<!-- modal pilihan -->
<div class="modal fade" id="modalPilihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form id="formPilihan">
    		
    		@csrf

      <div class="modal-header">
        <h5 class="modal-title-add"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="action" id="action">
      	<div>
      	<table class="table table-striped">
      			<tr>
      				<td>Kode Pilihan</td>
      				<td>:</td>
      				<td><input type="text" name="kode_pilihan" id="kode_pilihan" placeholder=" Masukan Kode Pilihan"></td>
      			</tr>
      			<tr>
      				<td>Nama Pilihan</td>
      				<td>:</td>
      				<td><input type="text" name="nama_pilihan" id="nama_pilihan" placeholder=" Masukan Nama Pilihan"></td>
      			</tr>
      			<tr>
      				<td>Diskon Pilihan</td>
      				<td>:</td>
      				<td>
      					<select name="diskon_pilihan" id="diskon_pilihan">
      						<option value="">Pilih Diskon</option>
      						<option value="20">20%</option>
      						<option value="30">30%</option>
      						<option value="40">40%</option>
      						<option value="50">50%</option>
      						<option value="60">60%</option>
      						<option value="70">70%</option>
      					</select>
      				</td>
      			</tr>
      	</table>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary" id="tombolSimpan">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal Lihat -->
	<div class="modal fade" id="modalPilihanlihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form id="formPilihanLihat">
    		@csrf
      <div class="modal-header">
        <h5 class="modal-title-lihat" id="exampleModalLabel">Lihat Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="actionlihat" id="actionlihat">
      	<table class="table" >
      			<tr>
      				<td>Kode Pilihan</td>
      				<td>:</td>
      				<td name="kode_pilihanlihat" id="kode_pilihanlihat"></td>
      			</tr>
      			<tr>
      				<td>Nama Pilihan</td>
      				<td>:</td>
      				<td name="nama_pilihanlihat" id="nama_pilihanlihat"></td>
      			</tr>
      			<tr style="text-align: center;">
      				<td>Diskon Pilihan</td>
      				<td>:</td>
      				<td rowspanname="diskon_pilihanlihat" id="diskon_pilihanlihat"></td>
      				<td>%</td>

      			</tr>		
      	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal hapus -->
	<div class="modal fade" id="modalPilihanHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<h5> Ingin Menghapus Data?</h5>
      	<input type="hidden" name="actionHapus" id="actionHapus">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
      	<button type='submit'class="btn btn-danger" id="pilihanHapus">Ya</button>
      </div>
      </form>
    </div>
  </div>
</div> <!-- tutup modal hapus -->

<!-- modal Status -->
	<div class="modal fade" id="modalPilihanStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<h5> Apakah ingin merubah status?</h5>
      	<input type="hidden" name="actionStatus" id="actionStatus">
      </div>
      <div class="modal-footer">
      	<button type='submit'class="btn btn-danger" id="tombolpilihanStatus">Ya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
      </div>
    </div>
  </div>
</div> <!-- tutup modal status -->



</body>

<!-- javascript -->
<script type="text/javascript">
	$(document).ready(function(){


//tambah data
$("#buttonAdd").click(function(){
			$(".modal-title-add").text('Tambah Data');
			$("#buttonSimpan").text('Tambah Data'); // id button save
			$('#kode_pilihan').attr('readonly',false);
			$("#action").val('tambah'); // id input 
			$('#modalPilihan').modal('show'); // menampilkan modal show		
		});
$('#modalPilihan').on('hidden.bs.modal',function(e){
	$('formPilihan')[0].reset();
});

	$('#tablePilihan').DataTable({
				processing : true,
				serverside:true,
				ajax:{
					url: '/pilihan',
				},
				columns:[
					{
						data:'kode_pilihan',
						name: 'kode_pilihan'
					},
					{
						data:'nama_pilihan',
						name: 'nama_pilihan'
					},
					{
						data:'status',
						name: 'status',
						orderable:false
					},
					{
						data:'lihat',
						name: 'lihat',
						orderable:false
					},
					{
						data:'ubah',
						name: 'ubah',
						orderable:false
					},
					{
						data:'hapus',
						name: 'hapus',
						orderable:false
					},

				]

			});
	
//tombol pop up yes 
	$("#formPilihan").on('submit',function(e){
		e.preventDefault();
		var action= $('#action').val();
		var kode_pilihan = $('#kode_pilihan').val();
		var nama_pilihan = $('#nama_pilihan').val();
		var diskon_pilihan= $('#diskon_pilihan').val()
		if (action == 'tambah'){
				if (kode_pilihan == "") {
					alert('Kode pilihan tidak boleh kosong');
				}else if (nama_pilihan == "") {
					alert('Nama pilihan tidak boleh kosong');
				}else if (diskon_pilihan == "") {
					alert('diskon pilihan tidak boleh kosong');
				}else if (kode_pilihan.length > 5 || kode_pilihan.length < 5) {
					alert('Karakter harus 5 digit');
				}else{
					$.ajax({
					url :'/pilihan/tambah',
					method:"POST",
					data:new FormData(this),
					contentType: false,
					cache:false,
					processData:false,
					dataType:"json",
					success:function(data){
						var html='';
					$("#modalPilihan").modal('hide'); // menggunakan id modal
				
					if (data.success) {
						html='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat!</strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						/*$("#ModalEdit")[0].reset();*/
						$("#tablePilihan").DataTable().ajax.reload();
						// $("#formPilihan")[0].reset() // menggunakan id form
					}
					$("#tablePilihan").DataTable().ajax.reload();
					if (data.error){
							html='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal !</strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
						
					$("#notif").html(html);
					}
				}); // penutup ajax
				}
				
			} // tutup if tamabah

			if (action == 'ubah'){
				/*alert('ajax untuk tambah');*/
				if (nama_pilihan=="") {
					alert('Nama tidak boleh kosong');
				}else if (diskon_pilihan==""){
					alert('Silahkan Pilih diskon anda !')
				}else{
					$.ajax({
					url :'pilihan/menambahkan',
					method:"POST",
					data:new FormData(this),
					contentType: false,
					cache:false,
					processData:false,
					dataType:"json",
					success:function(data){
						var html='';
					$("#modalPilihan").modal('hide'); // menggunakan id modal
				
					if (data.success) {
						html='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat!</strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						/*$("#ModalEdit")[0].reset();*/
						$("#formPilihan")[0].reset(); // menggunakan id form
					}
					$("#tablePilihan").DataTable().ajax.reload(); // id table
					if (data.error){
							html='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal !</strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
						$("#tablePilihan").DataTable().ajax.reload();
					$("#notif").html(html);
					}
				}); // penutup ajax      
				}
				
			} // tutup if tamabah
	});//penutup form on submit

// tombol ubah
		$(document).on('click','.ubah',function(){ //button class di controller
			var id = $(this).attr('id');
			// alert(id);
			$.ajax({
				url:"/pilihan/ubah/"+id,
				dataType: "json",
				success:function(html){
					$("#kode_pilihan").val(html.data[0].kode_pilihan);
					$("#nama_pilihan").val(html.data[0].nama_pilihan);
					$('#diskon_pilihan').val(html.data[0].diskon_pilihan);
					/*$('#kode_pilihan').prop("readonly", true); // read only*/
					$('.modal-title-add').text('Ubah Data');
					$('#kode_pilihan').attr('readonly',true);
					$('#action').val('ubah');
					$('#tombolSimpan').text('simpan');
					$("#modalPilihan").modal("show");
				}
			});
		});
// tombol lihat
		$(document).on('click','.lihat',function(){
			var id = $(this).attr('id');
			// alert(id);
			$.ajax({
				url:"/pilihan/lihat/"+id,
				dataType: "json",
				success:function(html){
					console.log(html);
					$("#kode_pilihanlihat").text(html.data[0].kode_pilihan);
					$("#nama_pilihanlihat").text(html.data[0].nama_pilihan);
					$("#diskon_pilihanlihat").text(html.data[0].diskon_pilihan);
					$('.modal-tittle-add').html('Lihat Data');


					$('#action').val('lihat');
					$('#tombolpilihanStatus').text('Update Data');
					$("#modalPilihanlihat").modal("show");
				}
			});
		});

//hapus
		var id_hapus;
				$(document).on('click','.hapus',function(){
					id_hapus = $(this).attr('id');
					
					$("#modalPilihanHapus").modal('show');	
				}); 

				$("#pilihanHapus").click(function(){
					$.ajax({
						url:'pilihan/hapus/'+id_hapus,
						beforeSend:function(){
							$("#pilihanHapus").text('Mohon Menunggu . . . . ');
						},
						success:function(){
							setTimeout(function(){
								$("#pilihanHapus").text('OK');
								$("#modalPilihanHapus").modal('hide');
								$("#tablePilihan").DataTable().ajax.reload();
							},500);
							}
						});
					});

//Status
		var id_status;
				$(document).on('click','.status',function(){
					id_status = $(this).attr('id');
					
					$("#modalPilihanStatus	").modal('show');	
				}); 

				$("#tombolpilihanStatus").click(function(){
					$.ajax({
						url:'pilihan/status/'+id_status,
						beforeSend:function(){
							$("#pilihanHapus").text('Mohon Menunggu :) . . . . ');
						},
						success:function(){
							setTimeout(function(){
								$("#modalPilihanStatus").modal('hide');
								$("#tombolpilihanStatus").text('OK');
								$("#tablePilihan").DataTable().ajax.reload();
							},500);
							}
						});
					});

}); // penutup ready function
</script>
</html>