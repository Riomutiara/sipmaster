	<div class="container my-5">		
		<div class="card shadow">
			<h4 class="card-header">Pembagian Kelompok Mahasiswa Diklat</h4>
			<div class="card-body">  		
			  	<form action="post" id="form_mahasiswa">
					<input type="hidden" name="username" id="username" value="<?php echo $user['username']; ?>">
					<input type="hidden" name="id_periode" id="id_periode" value="periode">

					<h5>I. Input Periode</h5>
					<div class="form-group">
				        <label for="periode">Periode</label>
						<select name="periode" id="periode" class="form-control selectpicker" data-live-search="true">
							<option selected>Pilih Periode</option>
							<?php 
								foreach ($periode as $row) 
								{
									echo '<option value="'.$row->periode_id.'">'.$row->periode_nama.'</option>';
								}
							?>	 	
						</select>		
						<small><span class="text-danger" id="error_periode"></span></small>	
						<br>
						<br>														
						<button type="button" id="add_button" class="btn btn-info" data-toggle="modal" data-target="#periodeModal"><i class="fas fa-check-circle fa-lg mr-2"></i>Input Periode</button>
					</div>
					<br>
					<hr>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="institusi">Institusi Pendidikan</label>
								<select name="institusi" id="institusi" class="form-control selectpicker" data-live-search="true">
								<option selected>Pilih Institusi Pendidikan</option>
								<?php 
									foreach ($institusi as $row) 
									{
										echo '<option value="'.$row->institusi_id.'">'.$row->institusi_nama.'</option>';
									}
								?>	 	
								</select>
								<small><span class="text-danger" id="error_institusi"></span></small>				    
							</div>							  
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="jadwal">Kode Jadwal</label>
								<select name="jadwal" id="jadwal" class="form-control">
									<option selected>Pilih Jadwal</option>		
								</select>
								<small><span class="text-danger" id="error_jadwal"></span></small>			    
							</div>							  
						</div>
					</div>
					<br>
					<hr>
					<h5>II. Input Kelompok & Mahasiswa</h5>						  								
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="ruangan">Ruangan</label>
								<select class="form-control selectpicker" id="ruangan" name="ruangan" data-live-search="true">
									<option selected>Pilih Ruangan</option>
								<?php 
									foreach ($ruangan as $row) 
									{
										echo '<option value="'.$row->ruangan_id.'">'.$row->ruangan_nama.'</option>';
									}
								?>	 								    					     
								</select>									
								<small><span class="text-danger" id="error_ruangan"></span></small>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="pembimbing">Pembimbing</label>
								<select class="form-control" id="pembimbing" name="pembimbing">
									<option selected>Pilih Pembimbing</option>															
								</select>									
								<small><span class="text-danger" id="error_pembimbing"></span></small>
							</div>						
						</div>
					</div>
					<div class="form-group">
						<label for="kelompok">Kelompok</label>
						<select name="kelompok" id="kelompok" class="form-control">
							<option selected>Pilih Kelompok</option>
							<option value="I">Kelompok 1</option>
							<option value="II">Kelompok 2</option>
							<option value="III">Kelompok 3</option>
							<option value="IV">Kelompok 4</option>
							<option value="V">Kelompok 5</option>
							<option value="VI">Kelompok 6</option>
							<option value="VII">Kelompok 7</option>
						</select>						
						<small><span class="text-danger" id="error_kelompok"></span></small>	
					</div>										
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="mahasiswa">Nama Mahasiswa</label>
								<select name="mahasiswa" id="mahasiswa" class="form-control">
									<option selected>Pilih Mahasiswa</option>																							
								</select>
								<small><span class="text-danger" id="error_mahasiswa"></span></small>				    
							</div>							  
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<button type="submit" name="btn_action" id="btn_action" class="btn btn-info btn-block"><i class="fas fa-download mr-2"></i>Insert Mahasiswa</button>
							</div>
						</div>
					</div>		
			  	</form>
				<!-- End Form -->	

				<!-- Table Mahasiswa -->
				<div class="table-responsive mb-5">
					<table class="table tabled-bordered table-hover table-sm" id="tabel_kelompok" width="100%">
						<thead class="thead-light">
							<tr>
							<th>No.</th>
							<th>Kelompok</th>
							<th>Nama Mahasiswa</th>			        
							<th>NPM</th>
							<th>Jenis Kelamin</th>
							<th>Ruangan</th>
							<th>Pembimbing Klinik</th>
							<th></th>					        
							</tr>
						</thead>					    		    
					</table>	
				</div>
				<!-- End Table -->		  
			</div>
			<!-- End card body -->
		</div>
		<!-- End card -->
	</div>
	<!-- End container -->

	<!-- Modal show details -->
	<div class="modal fade" id="periodeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="staticBackdropLabel"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" id="form_periode">
					<div class="modal-body">
						<div class="form-group">
							<label for="periode">Periode</label>
							<input type="text" name="periode_modal" id="periode_modal" class="form-control" placeholder="Contoh : 21 s/d 28 Oktober 2020">		
							<small><span class="text-danger" id="error_periode_modal"></span></small>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info">Simpan Periode</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					</div>	
				</form>
		
			</div>
		</div>
	</div>
	<!-- End modal details -->
								
</div>
<!-- End content -->
	
	
	<script>
		 
		$(document).ready(function(){
	// 		setTimeout(function(){// wait for 5 secs(2)
    //        dataTable.reload(); // then reload the page.(3)
    //   }, 5000); 

			$('#add_button').click(function(){
				$('.modal-title').text('Input Periode');

			});

			// Datatables
			dataTable = $('#tabel_kelompok').DataTable({
			"info":false,
			"processing":true,  
			"serverSide":true,  
			"order":[], 
			"ajax":
				{  
					"url":"<?php echo base_url(); ?>diklat/dataKelompok",  
					"type":"POST",
					"data": function(data)
					{
						data.Periode = $('#id_periode').val();
					}  
				},  
			"columnDefs":[  
					{  		    
						"targets":[0],  
						"orderable":false,  
					}  
				],
			"language":{
					"zeroRecords": "Data Mahasiswa pada periode ini tidak ada",
				},
			});
			// End Datatables
			
			
			$('#institusi').change(function(){
				var id=$(this).val();
				$.ajax({
					url : "<?php echo base_url();?>diklat/getJadwal",
					method : "POST",
					data : {id: id},
					async : false,
					dataType : 'json',
					success: function(data){
						var html = '';
						var i;
						html += '<option selected>Pilih Jadwal</option>';
						for(i=0; i<data.length; i++){
							html += '<option value="'+data[i].jadwal_id+'">'+data[i].jadwal_nama+'</option>';
						}
						$('#jadwal').html(html);	
					}
				});
			});

			$('#jadwal').change(function(){
				var id=$(this).val();
				$.ajax({
					url : "<?php echo base_url();?>diklat/getMahasiswa",
					method : "POST",
					data : {id: id},					
					async : false,
					dataType : 'json',
					success: function(data){
						var html = '';
						var i;
						for(i=0; i<data.length; i++){
							html += '<option value="'+data[i].mahasiswa_id+'">'+data[i].mahasiswa_nama+'</option>';
						}
						$('#mahasiswa').html(html);		
					}
				});
			});

			$('#ruangan').change(function(){
				var id=$(this).val();
				$.ajax({
					url : "<?php echo base_url();?>diklat/getPembimbing",
					method : "POST",
					data : {id: id},
					async : false,
					dataType : 'json',
					success: function(data){
						var html = '';
						var i;
						for(i=0; i<data.length; i++){
							html += '<option value="'+data[i].pembimbing_id+'">'+data[i].pembimbing_nama+'</option>';
						}
						$('#pembimbing').html(html);		
					}
				});
			});

			// Insert periode modal
			$(document).on('submit', '#form_periode', function(event){
			event.preventDefault();
			var periode 			= $('#periode_modal').val();	
			var error_periode_modal	= $('#error_periode_modal').val();

				if ($('#periode_modal').val() == '') 
				{
					error_periode_modal = 'Periode tidak boleh kosong';
					$('#error_periode_modal').text(error_periode_modal);
					periode = '';
				}
				else
				{
					error_periode_modal = '';
					$('#error_periode_modal').text(error_periode_modal);
					periode = $('#periode_modal').val();
				}	

				if (error_periode_modal != '')
				{
					Swal.fire({
						icon: 'error',
						title: 'Data belum lengkap!',
						text: 'Periode wajib diisi',
					});
				}
				else
				{
					$.ajax({
						url: '<?php echo base_url(); ?>diklat/inputPeriode',
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
							$('#form_periode')[0].reset();
							$('#periodeModal').modal('hide');							
							setTimeout(function(){// wait for 5 secs(2)
								location.reload(); // then reload the page.(3)
							}, 2000); 
						}
					});
				}

			});
			// End insert periode modal


			// Insert data kelompok
			$(document).on('submit', '#form_mahasiswa', function(event){
			event.preventDefault();

				var periode 			= $('#periode').val();
				var institusi 			= $('#institusi').val();
				var jadwal 				= $('#jadwal').val();
				var ruangan 			= $('#ruangan').val();
				var pembimbing 			= $('#pembimbing').val();
				var kelompok 			= $('#kelompok').val();
				var mahasiswa 			= $('#mahasiswa').val();
				var error_periode 		= $('#error_periode').val();
				var error_institusi 	= $('#error_institusi').val();
				var error_jadwal 		= $('#error_jadwal').val();
				var error_ruangan 		= $('#error_ruangan').val();
				var error_pembimbing 	= $('#error_pembimbing').val();
				var error_kelompok 		= $('#error_kelompok').val();
				var error_nama_mahasiswa = $('#error_nama_mahasiswa').val();
			
				if ($('#periode').val() == 'Pilih Periode') 
				{
					error_periode = 'Periode tidak boleh kosong';
					$('#error_periode').text(error_periode);
					periode = '';
				}
				else
				{
					error_periode = '';
					$('#error_periode').text(error_periode);
					periode = $('#periode').val();
				}	

				if ($('#institusi').val() == 'Pilih Institusi Pendidikan') 
				{
					error_institusi = 'Institusi Pendidikan tidak boleh kosong';
					$('#error_institusi').text(error_institusi);
					institusi = '';
				}
				else
				{
					error_institusi = '';
					$('#error_institusi').text(error_institusi);
					institusi = $('#institusi').val();
				}	

				if ($('#jadwal').val() == 'Pilih Jadwal') 
				{
					error_jadwal = 'Pilih Jadwal';
					$('#error_jadwal').text(error_jadwal);
					jadwal = '';
				}
				else
				{
					error_jadwal = '';
					$('#error_jadwal').text(error_jadwal);
					jadwal = $('#jadwal').val();
				}	

				if ($('#ruangan').val() == 'Pilih Ruangan') 
				{
					error_ruangan = 'Pilih Ruangan';
					$('#error_ruangan').text(error_ruangan);
					ruangan = '';
				}
				else
				{
					error_ruangan = '';
					$('#error_ruangan').text(error_ruangan);
					ruangan = $('#ruangan').val();
				}
				
				if ($('#pembimbing').val() == 'Pilih Pembimbing') 
				{
					error_pembimbing = 'Pilih Pembimbing';
					$('#error_pembimbing').text(error_pembimbing);
					pembimbing = '';
				}
				else
				{
					error_pembimbing = '';
					$('#error_pembimbing').text(error_pembimbing);
					pembimbing = $('#pembimbing').val();
				}	

				if ($('#kelompok').val() == 'Pilih Kelompok') 
				{
					error_kelompok = 'Pilih Kelompok';
					$('#error_kelompok').text(error_kelompok);
					kelompok = '';
				}
				else
				{
					error_kelompok = '';
					$('#error_kelompok').text(error_kelompok);
					kelompok = $('#kelompok').val();
				}	

				if (error_periode != '' || error_institusi != '' || error_jadwal != '' || error_ruangan != '' || error_pembimbing != '' || error_kelompok != '')
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
						url: '<?php echo base_url(); ?>diklat/inputKelompok',
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
							$('#id_periode').val(periode);
							dataTable.ajax.reload();															
						}
					});
				}
			});
			// END INSERT DATA

			// CHANGE DATA
			$(document).on('change', '#periode', function(){
				var periode = $('#periode').val();

				$('#id_periode').val(periode);
				dataTable.ajax.reload();
			});

			$(document).on('change', '#id_periode', function(){
				dataTable.ajax.reload();
			});
			// END CHANGE DATA


			// Delete data
			$(document).on('click', '.delete', function(){
			var kelompok_id = $(this).attr('id');
			
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
						url:'<?php echo base_url(); ?>diklat/deleteKelompok',
						method: 'POST',
						data:{kelompok_id, kelompok_id},
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
		// END DOCUMENT READY
	</script>
