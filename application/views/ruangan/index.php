		<div class="container-fluid my-5">	
			<div class="card shadow">
				<h4 class="card-header">Data Ruangan Diklat</h4>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<button type="submit" id="add_button" class="btn btn-info float-right" data-toggle="modal" data-target="#ruanganModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;Tambah Data</button>
							<button type="submit" id="add" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="#"><i class="fas fa-table fa-lg"></i>&nbsp;Export</button>			
						</div>
					</div>
					<br>
	
					<!-- Table -->
					<div class="table-responsive mb-5">
						<table class="table tabled-bordered table-hover table-sm" id="tabel_ruangan" width="100%">
							<thead class="thead-light">
							<tr>
								<th>No.</th>
								<th>Nama Ruangan</th>			        			        
								<th></th>
							</tr>
							</thead>		    
						</table>	
					</div>
					<!-- End Table -->
				</div>
				<!-- End card body -->
			</div>
			<!-- End card	 -->
			
			
			
		</div>
		<!-- End Container -->

		<!-- Ruangan Modal -->
		<div class="modal fade" id="ruanganModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		  	<form method="post" id="form_ruangan">
		  		<div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ruangan</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="form-group">
				        <label for="nama_ruangan">Nama Ruangan</label>
				        <input type="text" name="nama_ruangan" id="nama_ruangan" class="form-control" placeholder="Masukkan nama ruangan">
				        <small><span class="text-danger" id="error_nama_ruangan"></span></small>	
			      	</div>				      				      				      			      	   
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <input type="hidden" name="ruangan_id" id="ruangan_id">
			        <input type="hidden" name="btn_action" id="btn_action">
			        <input type="submit" name="action" id="action" class="btn btn-info">
			      </div>
		    	</div>
		  	</form>		    
		  </div>
		</div>
	</div>
		<!-- End Modal -->


		<!-- Optional JavaScript -->
  

    <script type="text/javascript">
    	$(document).ready(function(){
    		
    		$('#add_button').click(function(){
    			$('#form_ruangan')[0].reset();
    			$('#btn_action').val('Tambah');
    			$('#action').val('Tambah');
    		});

    		// Datatable
    		var dataTable = $('#tabel_ruangan').DataTable({
				"processing": true,
				"responsive": true,
				"info": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					url: "<?php echo base_url(); ?>diklat/dataRuangan",
					type: "POST"
				},
				"columnDefs": [
					{
						"targets": [0, 2],
						"orderable": false,
					}
				],					
			});
			// End Datatable

			// Insert data
			$(document).on('submit', '#form_ruangan', function(event){
			event.preventDefault();

				var	nama_ruangan		= $('#nama_ruangan').val();
				var	error_nama_ruangan	= $('#error_nama_ruangan').val();

				// Validasi
				if ($('#nama_ruangan').val() == '') 
	    		{
	    			error_nama_ruangan = 'Nama Ruangan tidak boleh kosong';
	    			$('#error_nama_ruangan').text(error_nama_ruangan);
	    			nama_ruangan = '';
	    		}
	    		else
	    		{
	    			error_nama_ruangan = '';
	    			$('#error_nama_ruangan').text(error_nama_ruangan);
	    			nama_ruangan = $('#nama_ruangan').val();
	    		}
	    		// End Validasi

				if (error_nama_ruangan != '') 
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
							url: '<?php echo base_url(); ?>diklat/inputRuangan',
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
								$('#form_ruangan')[0].reset();
								$('#ruanganModal').modal('hide');
								dataTable.ajax.reload();
							}
						});
	    		}
				});
				// End insert data

				// Edit data
				$(document).on('click', '.update', function(){
    			var	ruangan_id = $(this).attr('id');

    			$.ajax({
  					url: '<?php echo base_url(); ?>diklat/fetchSingleRuangan',
  					method: 'POST',
  					data:{ruangan_id:ruangan_id},
  					dataType:'json',
  					success:function(data)
  					{
						$('#ruanganModal').modal('show');
						$('#nama_ruangan').val(data.nama_ruangan);								    		
						$('.modal-title').text('Edit Data Ruangan');
						$('#ruangan_id').val(ruangan_id);
						$('#btn_action').val('Edit');
						$('#action').val('Edit');	    							
  					}
    			});
    		});
    		// End edit

    		// Delete data
	    	$(document).on('click', '.delete', function(){
			var ruangan_id = $(this).attr('id');
				
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
						url:'<?php echo base_url(); ?>diklat/deleteRuangan',
						method: 'POST',
						data:{ruangan_id, ruangan_id},
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
