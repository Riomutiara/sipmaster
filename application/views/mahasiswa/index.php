<div class="container my-5">		
			<div class="card shadow">
			  <h4 class="card-header">Input Mahasiswa</h4>
			  <div class="card-body">
			  	<div class="row">
			  		<div class="col-12">
			  			<a href="<?php echo base_url(); ?>institusi/dashboard" class="btn btn-success" role="button" aria-pressed="true"><i class="fas fa-download fa-lg mr-2"></i>Simpan ke Draft</a>			  			
			  		</div>			  		
			  	</div>			  						
			  	<hr>
			  	<br>			  		
			  	<form action="post" id="form_mahasiswa">
			  		<input type="hidden" name="username" id="username" value="<?php echo $user['username']; ?>">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
								  <label for="jadwal">Pilih Jadwal</label>
								  <select class="form-control" id="jadwal" name="jadwal">
								  	<option selected>Pilih Jadwal</option>
								  	<?php 
											foreach ($jadwal as $row) 
											{
												echo '<option value="'.$row->jadwal_id.'">'.$row->jadwal_nama.'</option>';
											}
										?>	 								    					     
									</select>
									<input type="hidden" name="id_jadwal" id="id_jadwal">
									<small><span class="text-danger" id="error_jadwal"></span></small>	
								</div>
							</div>				
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">									
									<label for="jurusan">Jurusan</label>
									<select class="form-control" id="jurusan" name="jurusan">
										<option selected>Pilih Jurusan</option>				
										<?php 
											foreach ($jurusan as $row) 
											{
												echo '<option value="'.$row->jurusan_id.'">'.$row->jurusan_nama.'</option>';
											}
										?>	 								    					     
									</select>
									<small><span class="text-danger" id="error_jurusan"></span></small>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
			    				<label for="jenis_praktek">Jenis Praktek</label>
			    				<select class="form-control" id="jenis_praktek" name="jenis_praktek">
							      <option selected>Pilih Jenis Praktek</option>
							      <option value="Keperawatan S1-Preklinik">Keperawatan S1-Preklinik</option>
							      <option value="Keparawatan S1-Komprehensif">Keparawatan S1-Komprehensif</option>
							      <option value="Keperawatan S2-Praktek Aplikasi">Keperawatan S2-Praktek Aplikasi</option>
							      <option value="Keperawatan-Profesi Ners">Keperawatan-Profesi Ners</option>
							      <option value="Keperawatan D3-Praktek Klinik">Keperawatan D3-Praktek Klinik</option>
							      <option value="Kedokteran S1-Kepaniteraan Klinik Senior">Kedokteran S1- Kepaniteraan Klinik Senior</option>
							      <option value="Rekam Medis-PKL">Rekam Medis-PKL</option>
							      <option value="Psikologi-PKL">Psikologi-PKL</option>	
							      <option value="Farmasi-PKL">Farmasi-PKL</option>	
							      <option value="SKM-PKL">SKM-PKL</option>	
							      <option value="Fisioterapy-PKL">Fisioterapy-PKL</option>
							      <option value="Manajemen RS-PKL">Manajemen RS-PKL</option>	
							      <option value="Magang Mahasiswa">Magang Mahasiswa</option>	
							      <option value="Magang Institusi">Magang Institusi</option>	
							      <option value="Magang Instansi">Magang Instansi</option>
							      <option value="Studi Banding">Studi Banding</option>	
							      <option value="Lainnya">Lainnya</option>	
							    </select>
							    <small><span class="text-danger" id="error_jenis_praktek"></span></small>
			    			</div>    			
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-4">
								<input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" placeholder="Nama Mahasiswa">
								<small><span class="text-danger" id="error_nama_mahasiswa"></span></small>
							</div>
							<div class="col-4">
								<input type="text" name="npm" id="npm" class="form-control" placeholder="NPM">
								<small><span class="text-danger" id="error_npm"></span></small>
							</div>
							<div class="col-4">
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
									<option selected>Pilih Jenis Kelamin</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<small><span class="text-danger" id="error_jenis_kelamin"></span></small>
							</div>
						</div>
						<br>
						<div class="form-group">
						<input type="hidden" name="jadwal_id" id="jadwal_id">
						<input type="hidden" name="btn_action" id="btn_action">
						<input type="submit" name="action" id="action" class="btn btn-info" value="Tambah Data Mahasiswa">
						</div>
			  	</form>
			  	<!-- End Form -->

			  	<!-- Tabel -->
			  	<div class="table-responsive mb-5">
						<table class="table tabled-bordered table-sm" id="tabel_mahasiswa" width="100%">
					    <thead class="thead-light">
					      <tr>
					      	<th>No.</th>
					      	<th>Nama Mahasiswa</th>			        
					        <th>NPM</th>
					        <th>Jenis Kelamin</th>
					        <th>Jurusan</th>
					        <th>Tingkat Supervisi</th>
					        <th></th>					        
					      </tr>
					    </thead>					    		    
				  	</table>	
					</div>
					<!-- End Table -->
			  </div>
			  <!-- End Body -->
			</div>					
		</div>
		<!-- End Container -->
		
		<script type="text/javascript">
			var dataTable;

			$(document).ready(function(){
				var id_jadwal = $('#jadwal').val();				
				$('#id_jadwal').val(id_jadwal);

				$(document).on('change', '#jadwal', function(){
				var id_jadwal = $('#jadwal').val();

					$('#id_jadwal').val(id_jadwal);
					dataTable.ajax.reload();

				});
				
				// Datatables
				dataTable = $('#tabel_mahasiswa').DataTable({
				"info": false,
				"processing":true,  
		       	"serverSide":true,  
		       	"order":[], 
						"ajax":
								{  
		              "url":"<?php echo base_url(); ?>institusi/dataMahasiswa",  
		              "type":"POST",
		              "data": function(data)
		              {
		              	data.Jadwal = $('#id_jadwal').val();
		              }  
		           },  
		         "columnDefs":[  
		              {  		    
		               "targets":[0, 6],  
		               "orderable":false,  
		              },  
		         	],
		         	"language":{
		         			"zeroRecords": "Data Mahasiswa kosong",
		         			"search": "NPM :"
		         	},
				});
  				// End Datatables
				
				// Insert mahasiswa
				$(document).on('submit', '#form_mahasiswa', function(event){
					event.preventDefault();

					var jadwal 				= $('#jadwal').val();
	    		var jurusan 				= $('#jurusan').val();
	    		var jenis_praktek 			= $('#jenis_praktek').val();
	    		var nama_mahasiswa 			= $('#nama_mahasiswa').val();
	    		var npm 					= $('#npm').val();
	    		var jenis_kelamin 			= $('#jenis_kelamin').val();
	    		var error_jadwal 			= $('#error_jadwal').val();
	    		var error_jurusan 			= $('#error_jurusan').val();
	    		var error_jenis_praktek		= $('#error_jenis_praktek').val();
	    		var error_nama_mahasiswa	= $('#error_nama_mahasiswa').val();
	    		var error_npm				= $('#error_npm').val();
	    		var error_jenis_kelamin		= $('#error_jenis_kelamin').val();

	    		if ($('#jadwal').val() == 'Pilih Jadwal')
	    		{
	    			error_jadwal = 'Pilih jadwal';
	    			$('#error_jadwal').text(error_jadwal);
	    			jadwal = '';    			
	    		}
	    		else
	    		{
	    			error_jadwal = '';
	    			$('#error_jadwal').text(error_jadwal);
	    			jadwal = $('#jadwal').val();
	    		}

	    		if ($('#jurusan').val() == 'Pilih Jurusan')
	    		{
	    			error_jurusan = 'Pilih Jurusan';
	    			$('#error_jurusan').text(error_jurusan);
	    			jurusan = '';    			
	    		}
	    		else
	    		{
	    			error_jurusan = '';
	    			$('#error_jurusan').text(error_jurusan);
	    			jurusan = $('#jurusan').val();
	    		}

	    		if ($('#jenis_praktek').val() == 'Pilih Jenis Praktek')
	    		{
	    			error_jenis_praktek = 'Pilih Jenis Praktek';
	    			$('#error_jenis_praktek').text(error_jenis_praktek);
	    			jenis_praktek = '';    			
	    		}
	    		else
	    		{
	    			error_jenis_praktek = '';
	    			$('#error_jenis_praktek').text(error_jenis_praktek);
	    			jenis_praktek = $('#jenis_praktek').val();
	    		}

	    		if ($('#nama_mahasiswa').val() == '')
	    		{
	    			error_nama_mahasiswa = 'Nama Mahasiswa tidak boleh kosong';
	    			$('#error_nama_mahasiswa').text(error_nama_mahasiswa);
	    			nama_mahasiswa = '';    			
	    		}
	    		else
	    		{
	    			error_nama_mahasiswa = '';
	    			$('#error_nama_mahasiswa').text(error_nama_mahasiswa);
	    			nama_mahasiswa = $('#nama_mahasiswa').val();
	    		}

	    		if ($('#npm').val() == '')
	    		{
	    			error_npm = 'NPM tidak boleh kosong';
	    			$('#error_npm').text(error_npm);
	    			npm = '';    			
	    		}
	    		else
	    		{
	    			error_npm = '';
	    			$('#error_npm').text(error_npm);
	    			npm = $('#npm').val();
	    		}

	    		if ($('#jenis_kelamin').val() == 'Pilih Jenis Kelamin')
	    		{
	    			error_jenis_kelamin = 'Pilih Jenis Kelamin';
	    			$('#error_jenis_kelamin').text(error_jenis_kelamin);
	    			jenis_kelamin = '';    			
	    		}
	    		else
	    		{
	    			error_jenis_kelamin = '';
	    			$('#error_jenis_kelamin').text(error_jenis_kelamin);
	    			jenis_kelamin = $('#jenis_kelamin').val();
	    		}

	    		if (error_jadwal != '' || error_jurusan != '' || error_jenis_praktek != '' || error_nama_mahasiswa != '' || error_npm != '' || error_jenis_kelamin != '') 
	    		{
	    			Swal.fire({
						icon: 'error',
						title: 'Data belum lengkap!',
						text: 'Mohon lengkapi data terlebih dahulu',
					});
	    		}
	    		else
	    		{		    			
	    			$.ajax({
					url: '<?php echo base_url(); ?>institusi/inputMahasiswa',
						method:'POST',
						data: new FormData(this),
						contentType: false,
						processData: false,
						success:function(data)
						{
							Swal.fire({
								icon: 'success',
								title: data,
								showConfirmButton: false,
								timer: 1500
							})		
							$('#nama_mahasiswa').val('');
							$('#npm').val('');
							$('#jenis_kelamin').val('Pilih Jenis Kelamin');
							dataTable.ajax.reload();								
						}
					});
	    		}
				});
				// End insert jadwal



				// Delete data
	    		$(document).on('click', '.delete', function(){
				var mahasiswa_id = $(this).attr('id');
				
					Swal.fire({
						title: 'Apakah Kamu Yakin?',
						text: "Hapus data ini?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						cancelButtonText: 'Batal',
						confirmButtonText: 'Ya, Hapus data ini'
					}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url:'<?php echo base_url(); ?>institusi/deleteMahasiswa',
							method: 'POST',
							data:{mahasiswa_id, mahasiswa_id},
							success:function(data)
							{
								Swal.fire({
									icon: 'success',
									title: data,
									showConfirmButton: false,
									timer: 1500
								})
								dataTable.ajax.reload();	    									
							}
						});
					}
					})	
	    		});
	    		// End Delete Data	
		});
		// End document ready
	</script>
