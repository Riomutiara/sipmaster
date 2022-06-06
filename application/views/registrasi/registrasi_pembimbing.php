<div class="container-fluid my-5">
			<div class="card shadow">
				<h4 class="card-header">Registrasi Pembimbing</h4>
				<div class="card-body">		
					<div class="row">
						<div class="col-md-12">
							<button type="submit" id="button_pembimbing" class="btn btn-info float-right" data-toggle="modal" data-target="#registerModal"><i class="fas fa-user fa-lg" title="Tambah Data Pembimbing"></i><i class="fas fa-plus fa-sm mr-2"></i>Pembimbing</button>					
							<!-- <button type="submit" id="button_institusi" class="btn btn-info float-right mr-3" data-toggle="modal" data-target="#registerModal"><i class="fas fa-user-graduate fa-lg" title="Tambah Data Institusi"></i><i class="fas fa-plus fa-sm mr-2"></i>Pembimbing</button>					 -->
						</div>
					</div>
					<br>
					<!-- Table -->
					<div class="table-responsive mb-5">
						<table class="table tabled-bordered table-hover table-sm" id="tabel_registrasi" width="100%">
							<thead class="thead-light">
							<tr>
								<th>No.</th>
								<th>Username</th>
								<th>Nama Akun</th>					        
								<!-- <th>Nama Pembimbing</th> -->
								<th>Status</th>
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

		<!-- Modal Institusi -->
		<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		  	<form method="post" id="form_registrasi">
		  		<div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="form-group">
			      		<label for="username">Username</label>
			      		<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username">
			      		<small><span class="text-danger" id="error_username"></span></small>
			      	</div>			      	
			      	
			      	<div class="form-group">
				        <label for="nama_pembimbing" id="label_pembimbing">Pilih Pembimbing</label>
				        <select class="form-control" name="nama_pembimbing" id="nama_pembimbing">
				        	<option selected>Pilih Salah Satu</option>
				        	<?php foreach ($pembimbing as $row) 
				        	{
				        		echo '<option value="'.$row->pembimbing_id.'">'.$row->pembimbing_nama.'</option>';
				        	} 
				        	?>
				        </select>
				        <small><span class="text-danger" id="error_nama_pembimbing"></span></small>	      		
			      	</div>
			      	<div class="form-group">
			      		<label for="nama_akun">Nama Akun</label>
			      		<input type="text" name="nama_akun" id="nama_akun" class="form-control" placeholder="Masukkan Nama Akun">
			      		<small><span class="text-danger" id="error_nama_akun"></span></small>
			      	</div>

			      	<div class="form-group">
				        <label for="password" id="label_password">Password</label>
				        <input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Password">
						<small><span class="text-danger" id="error_password"></span></small>		      		
			      	</div>		        		        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <input type="hidden" name="user_id" id="user_id">
			        <input type="hidden" name="btn_action" id="btn_action">
			        <input type="submit" name="action" id="action" class="btn btn-info">
			      </div>
		    	</div>
		  	</form>		    
		  </div>
		</div>
		<!-- End Modal -->

		<script type="text/javascript">	
			$(document).ready(function(){																							
				$('#button_pembimbing').click(function(){
					$('.modal-title').text('Registrasi Pembimbing');
					$('#btn_action').val('Submit_pembimbing');
					$('#action').val('Register');						
				});

				

				// Datatable
				 var dataTable = $('#tabel_registrasi').DataTable({
					"processing": true,
					"responsive": true,
					"info": false,
					"serverSide": true,
					"order": [],
					"ajax": {
						url: "<?php echo base_url(); ?>registrasi/tabelPembimbing",
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
				$(document).on('submit', '#form_registrasi' ,function(event){
				event.preventDefault();

					var username  			= $('#username').val();
					var nama_akun  			= $('#nama_akun').val();
					var nama_pembimbing  	= $('#nama_pembimbing').val();
					var password  			= $('#password').val();
					var error_username  	= $('#error_username').val();
					var error_nama_akun  	= $('#error_nama_akun').val();
					var error_nama_pembimbing  = $('#error_nama_pembimbing').val();
					var error_password 		 = $('#error_password').val();

					if ($('#username').val() == '')
		    		{
		    			error_username = 'Username tidak boleh kosong';
		    			$('#error_username').text(error_username);
		    			username = '';    			
		    		}
		    		else
		    		{
		    			error_username = '';
		    			$('#error_username').text(error_username);
		    			username = $('#username').val();
		    		}

		    		if ($('#nama_akun').val() == '')
		    		{
		    			error_nama_akun = 'Nama Akun tidak boleh kosong';
		    			$('#error_nama_akun').text(error_nama_akun);
		    			nama_akun = '';    			
		    		}
		    		else
		    		{
		    			error_nama_akun = '';
		    			$('#error_nama_akun').text(error_nama_akun);
		    			nama_akun = $('#nama_akun').val();
		    		}

		    		if ($('#nama_pembimbing').val() == 'Pilih Salah Satu')
		    		{
		    			error_nama_pembimbing = 'Pilih Nama Pembimbing';
		    			$('#error_nama_pembimbing').text(error_nama_pembimbing);
		    			nama_pembimbing = '';    			
		    		}
		    		else
		    		{
		    			error_nama_pembimbing = '';
		    			$('#error_nama_pembimbing').text(error_nama_pembimbing);
		    			nama_pembimbing = $('#nama_pembimbing').val();
		    		}
		    		
		    		if ($('#password').val() == '')
		    		{
		    			error_password = 'Password tidak boleh kosong';
		    			$('#error_password').text(error_password);
		    			password = '';    			
		    		}
		    		else
		    		{
		    			error_password = '';
		    			$('#error_password').text(error_password);
		    			password = $('#password').val();
		    		}

		    		if (error_username != '' || error_nama_akun != '' || error_nama_pembimbing != '' || error_password != '') 
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
		    				url: '<?php echo base_url(); ?>registrasi/inputPembimbing',
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
								$('#form_registrasi')[0].reset();
								$('#registerModal').modal('hide');
								dataTable.ajax.reload();						
							}
						});
	    			}
				});
				// End insert data

				
				// Update data
				$(document).on('click', '.update', function(){
					var user_id = $(this).attr('id');

					$.ajax({
						url: '<?php echo base_url(); ?>registrasi/fetchSingleInstitusi',
						method: 'POST',
						data: {user_id:user_id},
						dataType: 'json',
						success:function(data)
						{
							$('#registerModal').modal('show');
							$('.modal-title').text('Edit User');
							$('#btn_action').val('Edit_username');
							$('#action').val('Edit User');
							
							$('#username').val(data.username);
							$('#nama_akun').val(data.nama_akun);							
							
							$('#error_nama_pembimbing').text('');	
							$('#error_username').text('');	
							$('#error_nama_akun').text('');	
							$('#error_password').text('');	

							$('#label_pembimbing').hide();
							$('#nama_pembimbing').hide();	
							$('#nama_pembimbing').val('data sementara');

							$('#label_password').hide();
							$('#password').hide();
							$('#password').val('data sementara');	

							$('#user_id').val(user_id);			
						}
					});
				});
				// End update data
			});
			// End document ready
		</script>
</div>