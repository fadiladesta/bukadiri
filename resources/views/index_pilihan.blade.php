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

	</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
<div class="container">
		<br>
		<h1 style="text-align: center;">Data Pilihan</h1>
		<hr>
		<!-- button add -->
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="buttonAdd">Tambah</button><br><br>
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
        <h5 class="modal-title" id="exampleModalLabel">Pilihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="action" id="action">
      	<table class="table table-striped">
      			<tr>
      				<td>Kode Pilihan</td>
      				<td>:</td>
      				<td><input type="text" name="kode_pilihan" id="kode_pilihan" required></td>
      			</tr>
      			<tr>
      				<td>Nama Pilihan</td>
      				<td>:</td>
      				<td><input type="text" name="nama_pilihan" id="nama_pilihan" required></td>
      			</tr>
      			<tr>
      				<td>Diskon Pilihan</td>
      				<td>:</td>
      				<td>
      					<select name="diskon_pilihan" id="diskon_pilihan" required>
      						<option value="">Pilih Diskon</option>
      						<option value="1">20%</option>
      						<option value="2">30%</option>
      						<option value="3">40%</option>
      						<option value="4">50%</option>
      						<option value="5">60%</option>
      						<option value="5">70%</option>
      					</select>
      				</td>
      			</tr>
      	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary" id="tombolAdd">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal Ubah -->
	<div class="modal fade" id="modalPilihanUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content-ubah">
    	<form id="formPilihan2">
    		@csrf
      <div class="modal-header">
        <h5 class="modal-title-ubah" id="exampleModalLabel">Pilihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="actionUbah" id="actionUbah">
      	<table class="table table-striped">
      		<div class="container">
      		<thead>
      			<tr>
      				<td>Kode Pilihan</td>
      				<td>:</td>
      				<td><input type="text" name="kode_pilihanUbah" id="kode_pilihanUbah"></td>
      			</tr>
      			<tr>
      				<td>Nama Pilihan</td>
      				<td>:</td>
      				<td><input type="text" name="nama_pilihanUbah" id="nama_pilihanUbah"></td>
      			</tr>
      			<tr>
      				<td>Diskon Pilihan</td>
      				<td>:</td>
      				<td>
      					<select name="diskon_pilihanUbah" id="diskon_pilihanUbah">
      						<option value="">Pilih Diskon</option>
      			
      						<option value="20" name="20[]">20%</option>
      						<option value="30">30%</option>
      						<option value="40">40%</option>
      						<option value="50">50%</option>
      						<option value="60">60%</option>
      						<option value="70">70%</option>
      					</select>
      				</td>
      			</tr>

      		</thead>	
      		</div>
      		
      	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="tombolAdd">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
</body>

<!-- javascript -->
<script type="text/javascript">
	$(document).ready(function(){

$("#buttonAdd").click(function(){
			$(".modal-title").text('Tambah Data');
			$("#buttonSimpan").text('Tambah Data'); // id button save
			$("#action").val('tambah'); // id input 
			$('#modalPilihan').modal('show'); // menampilkan modal show		
		});
	$('#tablePilihan').DataTable({
				processing : true,
				serverside:true,
				ajax:{
					url: '/index_pilihan',
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
						name: 'status'
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

		if (action == 'tambah'){
				if (kode_pilihan.length > 5 || kode_pilihan.length < 5) {
					alert('Karakter Harus 5 Digit');
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
						$("#formPilihan")[0].reset() // menggunakan id form
					}
					$('#modalPilihan').DataTable().ajax.reload();
					if (data.error){
							html='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal !</strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
						$('#modalPilihan').DataTable().ajax.reload();
					$("#notif").html(html);
					}
				}); // penutup ajax
				}
				
			} // tutup if tamabah
			if (action == 'ubah'){
				/*alert('ajax untuk tambah');*/
				if (kode_pilihan.length > 5 || kode_pilihan.length < 5) {
					alert('Karakter Harus 5 Digit');
				}else{
					$.ajax({
					url :'/pilihan/menambahkan',
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
						$("#formPilihan")[0].reset() // menggunakan id form
					}
					$('#modalPilihan').DataTable().ajax.reload();
					if (data.error){
							html='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal !</strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
						$('#modalPilihan').DataTable().ajax.reload();
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
					$("#diskon_pilihan").val(html.data[0].diskon_pilihan);

					$('.modal-tittle').html('Edit Data');
					/*$('#kode_pilihan').prop("readonly", true); // read only*/
					$('#action').val('ubah');
					$('#tombolAdd').text('Update Data');
					$("#modalPilihan").modal("show");
				}
			});
		});
}); // penutup ready function
</script>
</html>