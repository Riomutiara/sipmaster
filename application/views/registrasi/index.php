		<div class="container-fluid my-5">
			<div class="card shadow">
				<h4 class="card-header">Registrasi Institusi Pendidikan</h4>
				<div class="card-body">		
					<div class="row">
						<div class="col-md-12">
							<button type="submit" id="button_institusi" class="btn btn-info float-right mr-3" data-toggle="modal" data-target="#registerModal"><i class="fas fa-user-graduate fa-lg" title="Tambah Data Institusi"></i><i class="fas fa-plus fa-sm mr-2"></i>Institusi Pendidikan</button>					
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
								<th>Nama Institusi</th>
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
				        <label for="nama_institusi" id="label_institusi">Pilih Institusi</label>
				        <select class="form-control" name="nama_institusi" id="nama_institusi">
				        	<option selected>Pilih Salah Satu</option>
				        	<?php foreach ($institusi as $row) 
				        	{
				        		echo '<option value="'.$row->institusi_id.'">'.$row->institusi_nama.'</option>';
				        	} 
				        	?>
				        </select>
						<small><span class="text-danger" id="error_nama_institusi"></span></small>
						<input type="hidden" name="keterangan" id="keterangan">										
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
				$('#button_institusi').click(function(){
					$('.modal-title').text('Registrasi Institusi');
					$('#btn_action').val('Submit_institusi');
					$('#action').val('Register');

					$('#label_institusi').show();	
					$('#nama_institusi').show();	
					$('#nama_institusi').val('Pilih Salah Satu');
					$('#username').val('');
					$('#nama_akun').val('');
									
					$('#error_username').text('');	
					$('#error_nama_akun').text('');	
					$('#error_password').text('');		
					
					$('#label_password').show();
					$('#password').show();
					$('#password').val('');
					$('#user_id').val('');
				});

				$(document).on('change', "#nama_institusi", function(){
					var keterangan = $('#nama_institusi').val();
					
					$.ajax({
						url : "<?php echo base_url();?>registrasi/fetchSingleNamaInstitusi",
						method : "POST",
						data : {keterangan: keterangan},
						async : false,
						dataType : 'json',
						success: function(data){
							$('#keterangan').val(data.keterangan);
						}
					});
				});				
				
				
				// Datatable
				 var dataTable = $('#tabel_registrasi').DataTable({
					"processing": true,
					"responsive": true,
					"info": false,
					"serverSide": true,
					"order": [],
					"ajax": {
						url: "<?php echo base_url(); ?>registrasi/tabelRegistrasi",
						type: "POST"
					},
					"columnDefs": [
						{
							"targets": [0, 5],
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
					var nama_institusi  	= $('#nama_institusi').val();
					var password  			= $('#password').val();
					var error_username  	= $('#error_username').val();
					var error_nama_akun  	= $('#error_nama_akun').val();
					var error_nama_institusi  = $('#error_nama_institusi').val();
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

		    		if ($('#nama_institusi').val() == 'Pilih Salah Satu')
		    		{
		    			error_nama_institusi = 'Pilih Institusi Pendidikan';
		    			$('#error_nama_institusi').text(error_nama_institusi);
		    			nama_institusi = '';    			
		    		}
		    		else
		    		{
		    			error_nama_institusi = '';
		    			$('#error_nama_institusi').text(error_nama_institusi);
		    			nama_institusi = $('#nama_institusi').val();
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

		    		if (error_username != '' || error_nama_akun != '' || error_nama_institusi != '' || error_password != '') 
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
		    				url: '<?php echo base_url(); ?>registrasi/inputUser',
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
							
							$('#error_nama_institusi').text('');	
							$('#error_username').text('');	
							$('#error_nama_akun').text('');	
							$('#error_password').text('');	

							
							$('#label_institusi').hide();	
							$('#nama_institusi').hide();	
							$('#nama_institusi').val('data sementara');	

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