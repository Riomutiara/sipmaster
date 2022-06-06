    	<div class="container-fluid my-5">
			<div class="card shadow">
				<h4 class="card-header">Daftar Jurusan</h4>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<button type="submit" id="add_button" class="btn btn-info float-right" data-toggle="modal" data-target="#jurusanModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;Tambah Data</button>
							<button type="submit" id="add" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="#"><i class="fas fa-table fa-lg"></i>&nbsp;Export</button>			
						</div>
					</div>
					<br>				

					<!-- Table -->
					<div class="table-responsive mb-5">
						<table class="table tabled-bordered table-hover table-sm" id="tabel_jurusan" width="100%">
							<thead class="thead-light">
							<tr>
								<th>No.</th>
								<th>Jurusan</th>
								<th>Tingkat Supervisi</th>
								<th>PIN Supervisi</th>
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
		<div class="modal fade" id="jurusanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		  	<form method="post" id="form_jurusan">
		  		<div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jurusan</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="form-group">
				        <label for="jurusan">Jurusan</label>
				        <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Masukkan nama jurusan">
				        <small><span class="text-danger" id="error_jurusan"></span></small>		      		
			      	</div>
			      	<div class="form-group">
				        <label for="supervisi">Supervisi</label>
				        <select class="form-control" id="supervisi" name="supervisi">
						      <option selected>Pilih tingkat supervisi</option>
						      <option value="Rendah">Rendah</option>
						      <option value="Tinggi">Tinggi</option>
						      <option value="Moderat">Moderat</option>
						      <option value="Moderat Tinggi">Moderat Tinggi</option>			
						    </select>		      		
				        <small><span class="text-danger" id="error_supervisi"></span></small>		      		
			      	</div>
			      	<div class="form-group">
				        <label for="pin">PIN Supervisi</label>
				        <select class="form-control" id="pin" name="pin">
						      <option selected>Pilih PIN supervisi</option>
						      <option value="Merah">Merah</option>
						      <option value="Kuning">Kuning</option>
						      <option value="Hijau">Hijau</option>
						      <option value="Biru">Biru</option>					     
						    </select>
						    <small><span class="text-danger" id="error_pin"></span></small>		      		
			      	</div>		        		        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <input type="hidden" name="jurusan_id" id="jurusan_id">
			        <input type="hidden" name="btn_action" id="btn_action">
			        <input type="submit" name="action" id="action" class="btn btn-info">
			      </div>
		    	</div>
		  	</form>		    
		  </div>
		</div>
</div>
		<!-- End Modal -->

		
     
    <script type="text/javascript">
    	$(document).ready(function(){
    		// Setting add button
    		$('#add_button').click(function(){
  				$('#form_jurusan')[0].reset();
  				$('#btn_action').val('Tambah');
  				$('#action').val('Tambah');    				
    		});
    		// End setting add button
  			
    		// Datatables
  			var	dataTable = $('#tabel_jurusan').DataTable({
  				"processing":true,  
				"serverSide":true,  
				"order":[], 
  				"ajax": {  
					url:"<?php echo base_url(); ?>diklat/dataJurusan",  
					type:"POST"  
				},  
				"columnDefs":[  
					{  		    
					"targets":[0, 2, 3, 4],  
					"orderable":false,  
					},  
           ],
  			});
  			// End Datatables

  			// Tambah jurusan
  			$(document).on('submit', '#form_jurusan', function(event){
	    	event.preventDefault();
	    		
	    		var	jurusan 			= $('#jurusan').val();
	    		var	supervisi 			= $('#supervisi').val();
	    		var	pin 				= $('#pin').val();		    		
	    		var	error_jurusan 		= $('#error_jurusan').val();		    		
	    		var	error_supervisi 	= $('#error_supervisi').val();		    		
	    		var	error_pin 			= $('#error_pin').val();		    		
	    		
	    		// Validation
		    	if ($('#jurusan').val() == '') 
	    		{
	    			error_jurusan = 'Jurusan tidak boleh kosong';
	    			$('#error_jurusan').text(error_jurusan);
	    			jurusan = '';
	    		}
	    		else
	    		{
	    			error_jurusan = '';
	    			$('#error_jurusan').text(error_jurusan);
	    			jurusan = $('#jurusan').val();
	    		}

	    		if ($('#supervisi').val() == 'Pilih tingkat supervisi') 
	    		{
	    			error_supervisi = 'Pilih Tingkat Supervisi';
	    			$('#error_supervisi').text(error_supervisi);
	    			supervisi = '';
	    		}
	    		else
	    		{
	    			error_supervisi = ''
	    			$('#error_supervisi').text(error_supervisi);
	    			supervisi = $('#supervisi').val();
	    		}

	    		if ($('#pin').val() == 'Pilih PIN supervisi') 
	    		{
	    			error_pin = 'Pilih PIN Supervisi';
	    			$('#error_pin').text(error_pin);
	    			pin = '';
	    		}
	    		else
	    		{
	    			error_pin = ''
	    			$('#error_pin').text(error_pin);
	    			pin = $('#pin').val();
	    		}
	    		// End validation
	    		
				if (error_jurusan != '' || error_supervisi != '' || error_pin != '') 
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
						url:"<?php echo base_url(); ?>diklat/inputJurusan",  
						method:'POST',  
						data: new FormData(this),			           
						contentType:false,  
						processData:false,  
						success:function(data)  
						{  
							Swal.fire({
								icon: 'success',
								title: data,
								showConfirmButton: false,
								timer: 1500
							})		  
							$('#form_jurusan')[0].reset();  
							$('#jurusanModal').modal('hide');		                	          
							dataTable.ajax.reload();  
						}  
		        	});
	    		}		    	
	    	});
	    	// End tambah jurusan

	    	// Update data
	    	$(document).on('click', '.update', function(){
    			var	user_id = $(this).attr('id');

    			$.ajax({
  					url: '<?php echo base_url(); ?>diklat/fetchSingleJurusan',
  					method: 'POST',
  					data:{user_id:user_id},
  					dataType:'json',
  					success:function(data)
  					{
							$('#jurusanModal').modal('show');
							$('#jurusan').val(data.jurusan);
							$('#supervisi').val(data.supervisi);
							$('#pin').val(data.pin);
							$('.modal-title').text('Edit Jurusan');
							$('#jurusan_id').val(user_id);
							$('#btn_action').val('Edit');
							$('#action').val('Edit');	    							
  					}
    			});
	    	});
	    	// End update data

	    	// Delete data
	    	$(document).on('click', '.delete', function(){
				var jurusan_id = $(this).attr('id');
				
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
						url:'<?php echo base_url(); ?>diklat/deleteJurusan',
						method: 'POST',
						data:{jurusan_id, jurusan_id},
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
