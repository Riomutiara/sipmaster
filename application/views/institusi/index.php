		
		<div class="container-fluid my-5">
			<div class="card shadow">
				<h4 class="card-header">Daftar Institusi Pendidikan</h4>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<button type="submit" id="add_button" class="btn btn-info float-right" data-toggle="modal" data-target="#institusiModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;Tambah Data</button>
							<button type="submit" id="add" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="#"><i class="fas fa-table fa-lg"></i>&nbsp;Export</button>	
						</div>
					</div>
					<br>	
					<!-- Table -->
					<div class="table-responsive mb-5">
						<table class="table tabled-bordered table-hover table-sm" id="tabel_institusi" width="100%">
						<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Nama Institusi</th>			        
							<th>Akreditasi</th>
							<th>Taanggal Berakhir MOU</th>
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
		<!-- End Container -->

		<!-- Modal -->
		<div class="modal fade" id="institusiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		  	<form method="post" id="form_institusi">
		  		<div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Institusi</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="form-group">
				        <label for="nama_institusi">Nama Institusi</label>
				        <input type="text" name="nama_institusi" id="nama_institusi" class="form-control" placeholder="Masukkan nama institusi">
				        <small><span class="text-danger" id="error_nama_institusi"></span></small>	
			      	</div>				      				      	
			      	<div class="form-group">
				        <label for="no_akreditasi">Nomor Akreditasi</label>
				        <input type="text" name="no_akreditasi" id="no_akreditasi" class="form-control" placeholder="Masukkan nomor akreditasi">
				        <small><span class="text-danger" id="error_no_akreditasi"></span></small>	
			      	</div>
			      	<div class="form-group">
				        <label for="tahun_akreditasi">Tahun Akreditasi</label>
						<input type="text" name="tahun_akreditasi" id="tahun_akreditasi" class="form-control" placeholder="Masukkan tahun akreditasi">		
						<small><span class="text-danger" id="error_tahun_akreditasi"></span></small>
			      	</div>
			      	<div class="form-group">
				        <label for="status">Status Akreditasi</label>
					        <select class="form-control" name="status" id="status">
						      <option selected>Pilih salah satu</option>
						      <option value="Akreditasi A">Akreditasi A</option>
						      <option value="Akreditasi B">Akreditasi B</option>
						      <option value="Akreditasi C">Akreditasi C</option>			
						    </select>
							<small><span class="text-danger" id="error_status"></span></small>	
			      	</div>
			      	<div class="form-group">
				        <label for="alamat">Alamat</label>
				        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat institusi"></textarea>
				        <small><span class="text-danger" id="error_alamat"></span></small>	
			      	</div>
			      	<div class="form-group">
				        <label for="telepon">Telepon</label>
				        <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan nomor telepon">		
				        <small><span class="text-danger" id="error_telepon"></span></small>
			      	</div>
			      	<div class="form-group">
				        <label for="email">Email</label>
				        <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan nomor email">		
				        <small><span class="text-danger" id="error_telepon"></span></small>
			      	</div>
			      	<div class="form-group">
				        <label for="tanggal_mou">Tanggal Berakhir MOU</label>
				        <input type="text" name="tanggal_mou" id="tanggal_mou" class="form-control" placeholder="Masukkan tanggal berakhir MOU">		
				        <small><span class="text-danger" id="error_telepon"></span></small>
			      	</div>			      	       		        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <input type="hidden" name="institusi_id" id="institusi_id">
			        <input type="hidden" name="btn_action" id="btn_action">
			        <input type="submit" name="action" id="action" class="btn btn-info">
			      </div>
		    	</div>
		  	</form>		    
		  </div>
		</div>
		<!-- End Modal -->


		<!-- Modal show details -->
		<div class="modal fade" id="detailsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Status : <h5 class="card-title" id="detail_status"></h5>
				    No. Akreditasi   : <p class="text-secondary" id="detail_nomor"></p>
				    Tahun Akreditasi : <p class="text-secondary" id="detail_tahun"></p>
				    Alamat : <p class="text-secondary" id="detail_alamat"></p>
				    No. Telepon : <p class="text-secondary" id="detail_telepon"></p>
				    Email : <p class="text-secondary" id="detail_email"></p>
				    <strong>Tanggal Berakhir MOU</strong> : <p class="text-secondary" id="detail_mou"></p>
				  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        </div>
		    </div>
		  </div>
		</div>
	</div>
		<!-- End modal details -->

    
  
  	<script type="text/javascript">		
		$(document).ready(function(){
			// Datetimepicker
			$('#tanggal_mou').datetimepicker({
				timepicker: false,
				datepicker: true,
				theme: 'dark',
				format: 'd-m-Y',		    		
			});

			// Tombol tambah ditekan
			$('#add_button').click(function(){
				$('#form_institusi')[0].reset();
				$('#btn_action').val('Tambah');
				$('#action').val('Tambah');
			});

			// Datatable
			var dataTable = $('#tabel_institusi').DataTable({
				"processing": true,
				"responsive": true,
				"info": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					url: "<?php echo base_url(); ?>diklat/dataInstitusi",
					type: "POST"
				},
				"columnDefs": [
					{
						"targets": [0, 4],
						"orderable": false,
					}
				],					
			});
			// End Datatable

			// Insert data
			$(document).on('submit', '#form_institusi', function(event){
				event.preventDefault();

				var	nama_institusi			= $('#nama_institusi').val();
				var	no_akreditasi			= $('#no_akreditasi').val();
				var	tahun_akreditasi		= $('#tahun_akreditasi').val();
				var	status					= $('#status').val();
				var	alamat					= $('#alamat').val();
				var	telepon					= $('#telepon').val();
				var	error_nama_institusi	= $('#error_nama_institusi').val();
				var	error_no_akreditasi		= $('#error_no_akreditasi').val();
				var	error_tahun_akreditasi	= $('#error_tahun_akreditasi').val();
				var	error_status			= $('#error_status').val();
				var	error_alamat			= $('#error_alamat').val();
				var	error_telepon			= $('#error_telepon').val();

				// Validasi
				if ($('#nama_institusi').val() == '') 
	    		{
	    			error_nama_institusi = 'Nama Institusi tidak boleh kosong';
	    			$('#error_nama_institusi').text(error_nama_institusi);
	    			nama_institusi = '';
	    		}
	    		else
	    		{
	    			error_nama_institusi = '';
	    			$('#error_nama_institusi').text(error_nama_institusi);
	    			nama_institusi = $('#nama_institusi').val();
	    		}

	    		if ($('#no_akreditasi').val() == '') 
	    		{
	    			error_no_akreditasi = 'Nomor Akreditasi tidak boleh kosong';
	    			$('#error_no_akreditasi').text(error_no_akreditasi);
	    			no_akreditasi = '';
	    		}
	    		else
	    		{
	    			error_no_akreditasi = '';
	    			$('#error_no_akreditasi').text(error_no_akreditasi);
	    			no_akreditasi = $('#no_akreditasi').val();
	    		}

	    		if ($('#tahun_akreditasi').val() == '') 
	    		{
	    			error_tahun_akreditasi = 'Tahun Akreditasi tidak boleh kosong';
	    			$('#error_tahun_akreditasi').text(error_tahun_akreditasi);
	    			tahun_akreditasi = '';
	    		}
	    		else
	    		{
	    			error_tahun_akreditasi = '';
	    			$('#error_tahun_akreditasi').text(error_tahun_akreditasi);
	    			tahun_akreditasi = $('#tahun_akreditasi').val();
	    		}

	    		if ($('#status').val() == 'Pilih salah satu') 
	    		{
	    			error_status = 'Harap pilih Status Akreditasi';
	    			$('#error_status').text(error_status);
	    			status = '';
	    		}
	    		else
	    		{
	    			error_status = '';
	    			$('#error_status').text(error_status);
	    			status = $('#status').val();
	    		}

	    		if ($('#alamat').val() == '') 
	    		{
	    			error_alamat = 'Alamat tidak boleh kosong';
	    			$('#error_alamat').text(error_alamat);
	    			alamat = '';
	    		}
	    		else
	    		{
	    			error_alamat = '';
	    			$('#error_alamat').text(error_alamat);
	    			alamat = $('#alamat').val();
	    		}

	    		if ($('#telepon').val() == '') 
	    		{
	    			error_telepon = 'Nomor Telepon tidak boleh kosong';
	    			$('#error_telepon').text(error_telepon);
	    			telepon = '';
	    		}
	    		else
	    		{
	    			error_telepon = '';
	    			$('#error_telepon').text(error_telepon);
	    			telepon = $('#telepon').val();
	    		}
	    		// End validasi

				if (error_nama_institusi != '' || error_no_akreditasi != '' || error_tahun_akreditasi != '' || error_status != '' || error_alamat != '' || error_telepon != '')
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
						url: '<?php echo base_url(); ?>diklat/inputInstitusi',
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
							$('#form_institusi')[0].reset();
							$('#institusiModal').modal('hide');
							dataTable.ajax.reload();
						}
					});			    				
	    		}
				});
				// End insert data

				// Update data
	    	$(document).on('click', '.update', function(){
    			var	institusi_id = $(this).attr('id');

    			$.ajax({
  					url: '<?php echo base_url(); ?>diklat/fetchSingleInstitusi',
  					method: 'POST',
  					data:{institusi_id:institusi_id},
  					dataType:'json',
  					success:function(data)
  					{
						$('#institusiModal').modal('show');
						$('#nama_institusi').val(data.nama_institusi);
						$('#no_akreditasi').val(data.no_akreditasi);
						$('#tahun_akreditasi').val(data.tahun_akreditasi);
						$('#status').val(data.status);
						$('#alamat').val(data.alamat);
						$('#telepon').val(data.telepon);	    							
						$('#email').val(data.email);	    							
						$('#tanggal_mou').val(data.tanggal_mou);	    							
						$('.modal-title').text('Edit Institusi');
						$('#institusi_id').val(institusi_id);
						$('#btn_action').val('Edit');
						$('#action').val('Edit');	    							
  					}
    			});
	    	});
	    	// End update data

	    	// Details data
	    	$(document).on('click', '.details', function(){
    			var	institusi_id = $(this).attr('id');

    			$.ajax({
  					url: '<?php echo base_url(); ?>diklat/fetchSingleInstitusi',
  					method: 'POST',
  					data:{institusi_id:institusi_id},
  					dataType:'json',
  					success:function(data)
  					{
						$('#detailsModal').modal('show');
						$('.modal-title').text(data.nama_institusi);
						$('#detail_status').text(data.status);
						$('#detail_nomor').text(data.no_akreditasi);
						$('#detail_tahun').text(data.tahun_akreditasi);
						$('#detail_alamat').text(data.alamat);
						$('#detail_telepon').text(data.telepon);
						$('#detail_email').text(data.email);
						$('#detail_mou').text(data.tanggal_mou);
  					}
    			});
	    	});
	    	// End details

	    	// Delete data
	    	$(document).on('click', '.delete', function(){
			var institusi_id = $(this).attr('id');
				
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
						url:'<?php echo base_url(); ?>diklat/deleteInstitusi',
						method: 'POST',
						data:{institusi_id, institusi_id},
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
					})
				}
				})   		
	    	});
	    	// End Delete Data
		});
		// End document ready  		  	
  	</script>