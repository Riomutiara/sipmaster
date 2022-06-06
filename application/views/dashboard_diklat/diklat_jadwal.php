		<div class="container-fluid my-5">
			<div class="card shadow">
				<h4 class="card-header">Jadwal Diklat</h4>
				<div class="card-body">
					<!-- Tabel -->
					<div class="table-responsive mb-5">
						<table class="table tabled-bordered table-hover table-sm" id="tabel_jadwal" width="100%">
							<thead class="thead-light">
								<tr>
								<th>No.</th>
								<th>Nama Institusi</th>			        
								<th>Kode Jadwal</th>			        
								<th>Tanggal Mulai</th>
								<th>Tanggal Berakhir</th>
								<th>Status</th>
								<th>Kuota/Orang</th>									
								<th></th>					       							      				        					        					     				       							      				        					        					     
								</tr>
							</thead>					    		    
						</table>	
					</div>
					<!-- End Table -->
				</div>
				<!-- End card body -->
			</div>
			<!-- end card -->	  
		</div>
		<!-- End container -->
	</div>


		<!-- Modal show details -->
		<div class="modal fade" id="detailsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title" id="staticBackdropLabel"></h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" id="form_kirim">
				<div class="modal-body">
		        	Kode Jadwal : <h5 class="card-title" id="nama_jadwal"></h5>
				    Tanggal Mulai   : <p class="text-secondary" id="tanggal_mulai"></p>
				    Tanggal Akhir : <p class="text-secondary" id="tanggal_akhir"></p>
					Status : <h4><i><span class="badge badge-info" id="status" 
					name="status"></span></i></h4>
					
							   
				    <div class="table-responsive mb-5">
						<table class="table tabled-bordered table-sm" id="tabel_jadwal_modal" width="100%">
						    <thead class="thead-light">
						      <tr>
						      	<th>No.</th>
						      	<th>Nama Mahasiswa</th>			        
						        <th>NPM</th>
						        <th>Jenis Kelamin</th>					        				        					        					     
						        <th>Jurusan</th>					        				        					        					     
						      </tr>
						    </thead>					    					    		    
				  		</table>	
					</div>
					<!-- End Table -->
				  </div>
		      	<div class="modal-footer">
		      		<input type="hidden" name="jadwal_id" id="jadwal_id">
		      		<input type="hidden" name="action" id="action">
		      		<input type="hidden" name="file" id="file">
					<button type="button" class="btn btn-success" id="download" target="_blank"><i class="fas fa-file-download mr-2"></i>Download Surat Pengantar</button>		     
		      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		      	</div>	
		      </form>
		      
		    </div>
		  </div>
		</div>
		<!-- End modal details -->

		<!-- Modal show nilai -->
		<div class="modal fade" id="nilaiModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title" id="staticBackdropLabel"></h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" id="form_nilai">
				<div class="modal-body">
		        	Kode Jadwal : <h5 class="card-title" id="nilai_nama_jadwal"></h5>
				    Tanggal Mulai   : <p class="text-secondary" id="nilai_tanggal_mulai"></p>
				    Tanggal Akhir : <p class="text-secondary" id="nilai_tanggal_akhir"></p>
					Status : <h4><i><span class="badge badge-info" id="nilai_status" name="status"></span></i></h4>
					<br>
					<div id="uploadLabel" name="uploadLabel">Upload Nilai Mahasiswa : </div>					
					<div class="row mb-3">
						<div class="class col-sm-9">
						<div class="custom-file" id="upload" name="upload">
							<input type="file" class="custom-file-input" id="file_nilai" name="file_nilai">
							<label class="custom-file-label" for="pdf">Format .pdf (MAX. 1MB)</label>
							<small><span class="text-danger" id="error_file"></span></small>
							<small id="emailHelp" class="form-text text-muted">File format PDF, ukuran max 1 MB.</small>
						</div>
						</div>
					</div>
							   
				    
				  </div>
		      	<div class="modal-footer">
		      		<input type="hidden" name="nilai_jadwal_id" id="nilai_jadwal_id">
		      		<input type="hidden" name="action_nilai" id="action_nilai">
		      		<input type="hidden" name="file_nilai" id="file_nilai">
					<!-- <button type="button" class="btn btn-success" id="download" target="_blank"><i class="fas fa-file-download mr-2"></i>Download Surat Pengantar</button> -->
					<button type="submit" class="btn btn-success" ><i class="fas fa-file-upload mr-2"></i>Upload Nilai</button>		     
		      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		      	</div>	
		      </form>
		    </div>
		  </div>
		</div>
		<!-- End modal details -->
	
    <script type="text/javascript">
  		$(document).ready(function(){


    		// Datatables Jadwal
			dataTable = $('#tabel_jadwal').DataTable({
			"info":false,
			"processing":true,  
	       	"serverSide":true,  
	       	"order":[], 
			"ajax":
				{  
				"url":"<?php echo base_url(); ?>diklat/dataJadwalAdmin",  
				"type":"POST",           
	           },  
	         "columnDefs":[  
	            {  		    
	             "targets":[0, 6, 7],  
	             "orderable":false,  
	            },  
	         	],         	
			});
  			// End Datatables jadwal

  			  			
	    	// Kirim 
	    	$(document).on('submit', '#form_kirim', function(event){
			event.preventDefault();
			
				Swal.fire({
					title: 'Apakah Kamu Yakin?',
					// text: "Approve Jadwal ini?",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Batal',
					confirmButtonText: 'Ya, Saya yakin'
				}).then((result) => {
				if (result.isConfirmed) {	
					$.ajax({
						url: '<?php echo base_url(); ?>institusi/batalkanJadwal',
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
							$('#detailsModal').modal('hide');
							dataTable.ajax.reload();							
						}
					});
				}
				})
			});
			// End kirim jadwal	

			
			// 	Approve data
			$(document).on('click', '.approve', function(){			
				var jadwal_id = $(this).attr('id');
				$.ajax({
					url: '<?php echo base_url(); ?>institusi/fetchSingleJadwal',
					method: 'POST',
					data: {jadwal_id:jadwal_id},
					dataType: 'JSON',
					success:function(data)
					{												 
						$('#detailsModal').modal('show');
						$('.modal-title').text('Detail Jadwal');
						$('#nama_jadwal').text(data.nama_jadwal);
						$('#tanggal_mulai').text(data.tanggal_mulai);
						$('#tanggal_akhir').text(data.tanggal_akhir);
						$('#status').text(data.status);	

						if ($('#status').text() == 'draft') 
						{
							$('#download').hide();						
						}
						else
						{
							$('#download').show();													
						}	

						$('#jadwal_id').val(jadwal_id);
						$('#action').val('Approve');
						$('#file').val(data.file);

						dataTable2 = $('#tabel_jadwal_modal').DataTable({
						"paging": false,
						"searching": false,
						"destroy": true,
						"info": false,
						"processing": true,  
				       	"serverSide": true,  
				       	"order": false, 
						"ajax":
							{  
				            "url":"<?php echo base_url(); ?>institusi/dataMahasiswaDashboard",  
				            "type":"POST",
				            "data": function(data)
					            {
					            	data.Jadwalllllllll = $('#jadwal_id').val();
					            }            
				           	},
			          	 "columnDefs":[  
					            {  		    
					             "targets":[0, 1, 2, 3, 4],  
					             "orderable":false,  
					            },  
         					],    				         	
						});
			  			// End Datatables jadwal
						dataTable2.ajax.reload();					
					}
				});
			});
			// End approve jadwal
			$(document).on('click', '#download', function(){			
				var jadwal_id = $(this).attr('id');
				var filepdf = $('#file').val();
				$.ajax({
					url: '<?php echo base_url(); ?>institusi/fetchSingleJadwal',
					method: 'POST',
					data: {jadwal_id:jadwal_id},
					dataType: 'JSON',
					success:function(data){
						
						window.open ('<?php echo base_url('assets/documents/suratpengantar/') ?>'+filepdf)
					}
				});
			});

			// 	Nilai data
			$(document).on('click', '.upload_nilai', function(){			
				var jadwal_id = $(this).attr('id');
				
				$.ajax({
					url: '<?php echo base_url(); ?>institusi/fetchSingleJadwal',
					method: 'POST',
					data: {jadwal_id:jadwal_id},
					dataType: 'JSON',
					success:function(data)
					{												 
						$('#nilaiModal').modal('show');
						$('.modal-title').text('Upload Nilai Mahasiswa');
						$('#nilai_nama_jadwal').text(data.nama_jadwal);
						$('#nilai_tanggal_mulai').text(data.tanggal_mulai);
						$('#nilai_tanggal_akhir').text(data.tanggal_akhir);
						$('#nilai_status').text(data.status);					
						$('#action_nilai').val('Kirim');
						
						if ($('#status').text() == 'draft') 
						{
							$('#download').hide();						
						}
						else
						{
							$('#download').show();													
						}	

						$('#nilai_jadwal_id').val(jadwal_id);

										
					}
				});
			});
			// End nilai 

			// Kirim nilai 
	    	$(document).on('submit', '#form_nilai', function(event){
				event.preventDefault();
				var jadwal_id = $('#nilai_jadwal_id').val();
				var	filepdf = $('#file_nilai').val();
				var error_file = $('#error_file').val();

				if ($('#file_nilai').val() == '') 
	    		{
	    			error_file = 'File nilai mahasiswa tidak boleh kosong';
	    			$('#error_file').text(error_file);
	    			file = '';
	    		}
	    		else
	    		{
	    			error_file = '';
	    			$('#error_file').text(error_file);
	    			file = $('#file_nilai').val();
				}

				
				
				if (error_file != '')
				{
					Swal.fire({
						icon: 'error',
						title: 'File nilai mahasiswa belum diupload!',
						text: 'Mohon lengkapi data terlebih dahulu',
					});
				} 
				else
				{
					Swal.fire({
						title: 'Apakah Kamu Yakin?',
						text: "Upload file nilai ini?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						cancelButtonText: 'Batal',
						confirmButtonText: 'Ya, Saya Yakin'
					}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: '<?php echo base_url(); ?>diklat/uploadNilai',
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
									timer: 2000
								})						
								$('#nilaiModal').modal('hide');
								dataTable.ajax.reload();								
							}
						});
					}
					})			
				}
	    	});	
			
    	});
    	// End document ready
    </script>
	