		<div class="container-fluid my-5">
			<div class="row-lg-md-sm-12">
				<div class="col-lg-md-sm-12">
					<div class="card shadow">
					  <h4 class="card-header">Draft Jadwal</h4>
					  <div class="card-body">
						  <a href="<?php echo base_url(); ?>institusi/mahasiswa" class="btn btn-info float-right" role="button" aria-pressed="true"><i class="fas fa-edit mr-2"></i>Edit Jadwal</a>
						  <br>
					  	<input type="hidden" name="username" id="username" value="<?php echo $user['username']; ?>">
					  	<br>
					  	<br>
					    <!-- Tabel -->
					  	<div class="table-responsive mb-5">
							<table class="table tabled-bordered table-hover table-sm" id="tabel_jadwal" width="100%">
							    <thead class="thead-light">
							      <tr>
							      	<th>No.</th>
							      	<th>Kode Jadwal</th>			        
							        <th>Tanggal Mulai</th>
							        <th>Tanggal Berakhir</th>
							        <th>Kuota/Orang</th>
							        <th>Status</th>
							        <th>Action</th>					        						       					        					        		     
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
				<!-- End Col -->
			</div>
			<!-- End Row -->
		</div>
		<!-- End container -->
	</div>


		<!-- Modal show details -->
		<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title" id="staticBackdropLabel">Detail Jadwal Diklat</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" id="form_kirim">
				<div class="modal-body">
					<div class="form-group">
						Kode Jadwal : <strong><p class="card-title" id="nama_jadwal"></p></strong>
					</div>
					<div class="form-group">
						Kuota (Orang) : <input type="text" name="kuota" id="kuota" class="form-control">
						<small id="emailHelp" class="form-text text-muted">Pastikan jumlah Mahasiswa sesuai dengan Kuota yang anda inputkan.</small>
						<small><span class="text-danger" id="error_kuota"></span></small>
					</div>
					<div class="form-group">
						Tanggal Mulai   : <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
						<small><span class="text-danger" id="error_tanggal_mulai"></span></small>
					</div>
					<!-- <span class="text-danger" id="error_tanggal_mulai"></span> -->
					<div class="form-group">
						Tanggal Berakhir   : <input type="text" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
						<small><span class="text-danger" id="error_tanggal_akhir"></span></small>
					</div>
					<div id="uploadLabel" name="uploadLabel">Upload Surat Pengantar : </div>					
					<div class="row mb-3">
						<div class="class col-sm-9">
						<div class="custom-file" id="upload" name="upload">
							<input type="file" class="custom-file-input" id="file" name="file">
							<label class="custom-file-label" for="pdf">Format .pdf (MAX. 1MB)</label>
							<small><span class="text-danger" id="error_file"></span></small>
							<small id="emailHelp" class="form-text text-muted">File format PDF, ukuran max 1 MB.</small>
						</div>
						</div>
					</div>
				
				    Status : <h4><i><span class="badge badge-info" id="status" name="status"></span></i></h4>
								   
				    <div class="table-responsive mb-5">
						<table class="table tabled-bordered table-sm" id="tabel_jadwal_modal" width="100%">
						    <thead class="thead-light">
						      <tr>
						      	<th>No.</th>
						      	<th>Nama Mahasiswa</th>			        
						        <th>NPM</th>
						        <th>Jenis Kelamin</th>					        				        					        					     
						      </tr>
						    </thead>					    					    		    
				  		</table>	
					</div>
					<!-- End Table -->

				  </div>
		      	<div class="modal-footer">
		      		<input type="hidden" name="jadwal_id" id="jadwal_id">
		      		<input type="hidden" name="action" id="action">
		      		<input type="hidden" name="dokumen" id="dokumen">
					<button type="submit" name="btn_action" id="btn_action" class="btn btn-success"><i class="fas fa-paper-plane mr-2"></i>Kirim Jadwal</button>
					<button type="button" class="btn btn-secondary" action="javascript:document.location.reload()" data-dismiss="modal" id="batal">Tutup</button>
		      	</div>	
		      </form>	      
		    </div>
		  </div>
		</div>
		<!-- End modal details -->
	
	<script type="text/javascript">		
  		$(document).ready(function(){
			  // Datetimepicker
			  $('#tanggal_mulai').datetimepicker({
    		timepicker: false,
    		datepicker: true,
			scrollInput : false,
    		theme: 'dark',
    		format: 'd-m-Y',
    		onShow: function(ct){
    			this.setOptions({
    				maxDate: $('#tanggal_akhir').val() ? $('#tanggal_akhir').val() :false
    			})
    		}
  		})
  		$('#tanggal_akhir').datetimepicker({
    		timepicker: false,
    		datepicker: true,
			scrollInput : false,
    		theme: 'dark',
    		format: 'd-m-Y',
    		onShow: function(ct){
    			this.setOptions({
    				minDate: $('#tanggal_mulai').val() ? $('#tanggal_mulai').val() :false
    			})
    		}
    	})
		// End datetimepicker

    		// Datatables Jadwal
			dataTable = $('#tabel_jadwal').DataTable({
				"info": false,
				"processing": true,  
				"serverSide": true,  
				"order": [], 
				"ajax":
					{  
	            "url":"<?php echo base_url(); ?>institusi/dataJadwal",  
	            "type":"POST",
	            "data": function(data)
		              {
		              	data.Usernameeeeeeeeeeeeeee = $('#username').val();
		              }                 
	           },  
	         "columnDefs":[  
	            {  		    
	             "targets":[0, 6],  
	             "orderable":false,  
	            },  
	         	],         	
			});
  			// End Datatables jadwal

  			  			
  			// 	Detail data
			$(document).on('click', '.details', function(){			
				var jadwal_id = $(this).attr('id');
				console.log(jadwal_id);
				$.ajax({
					url: '<?php echo base_url(); ?>institusi/fetchSingleJadwal',
					method: 'POST',
					data: {jadwal_id:jadwal_id},
					dataType: 'JSON',
					success:function(data)
					{						
						 
						$('#detailsModal').modal('show');
						$('#nama_jadwal').text(data.nama_jadwal);
						$('#kuota').val(data.kuota);
						$('#tanggal_mulai').val(data.tanggal_mulai);
						$('#tanggal_akhir').val(data.tanggal_akhir);
						$('#jadwal_id').val(jadwal_id);
						$('#action').val('Kirim');
						$('#dokumen').val(data.dokumen);

						$('#status').text(data.status);	
						if ($('#status').text() == 'draft') 
						{
							$('#btn_action').show();
							$('#upload').show();
							$('#btn_print').hide();	
						}
						else
						{
							$('#btn_action').hide();
							$('#upload').hide();
							$('#uploadLabel').hide();
							$('#btn_print').show();
						}
						
						dataTable2 = $('#tabel_jadwal_modal').DataTable({
						// "paging": false,
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
					             "targets":[0, 1, 2, 3],  
					             "orderable":false,  
					            },  
         					],    				         	
						});
			  			// End Datatables jadwal
			  			dataTable2.ajax.reload();
					}
				});
			});
			// End details


			// Delete
			$(document).on('click', '.delete', function(){
				var jadwal_id = $(this).attr('id');
				
				Swal.fire({
					title: 'Apakah Kamu Yakin?',
					text: "Dengan menghapus data ini, data mahasiswa pada jadwal ini juga akan terhapus.",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Batal',
					confirmButtonText: 'Ya, Hapus data ini'
				}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url:'<?php echo base_url(); ?>institusi/deleteJadwal',
						method: 'POST',
						data:{jadwal_id, jadwal_id},
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


	    	// Kirim 
	    	$(document).on('submit', '#form_kirim', function(event){
				event.preventDefault();
				
				var	filepdf = $('#file').val();
				var	kuota = $('#kuota').val();
				var	tanggal_mulai = $('#tanggal_mulai').val();
				var	tanggal_akhir = $('#tanggal_akhir').val();
				var error_file = $('#error_file').val();
				var error_kuota = $('#error_kuota').val();
				var error_tanggal_mulai = $('#error_tanggal_mulai').val();
				var error_tanggal_akhir = $('#error_tanggal_akhir').val();

				if ($('#file').val() == '') 
	    		{
	    			error_file = 'Surat Pengantar tidak boleh kosong';
	    			$('#error_file').text(error_file);
	    			file = '';
	    		}
	    		else
	    		{
	    			error_file = '';
	    			$('#error_file').text(error_file);
	    			file = $('#file').val();
				}

				if ($('#kuota').val() == '') 
	    		{
	    			error_kuota = 'Kuota tidak boleh kosong';
	    			$('#error_kuota').text(error_kuota);
	    			kuota = '';
	    		}
	    		else
	    		{
	    			error_kuota = '';
	    			$('#error_kuota').text(error_kuota);
	    			kuota = $('#kuota').val();
				}

				if ($('#tanggal_mulai').val() == '') 
	    		{
	    			error_tanggal_mulai = 'Tanggal mulai tidak boleh kosong';
	    			$('#error_tanggal_mulai').text(error_tanggal_mulai);
	    			tanggal_mulai = '';
	    		}
	    		else
	    		{
	    			error_tanggal_mulai = '';
	    			$('#error_tanggal_mulai').text(error_tanggal_mulai);
	    			tanggal_mulai = $('#tanggal_mulai').val();
				}

				if ($('#tanggal_akhir').val() == '') 
	    		{
	    			error_tanggal_akhir = 'Tanggal berakhir tidak boleh kosong';
	    			$('#error_tanggal_akhir').text(error_tanggal_akhir);
	    			tanggal_akhir = '';
	    		}
	    		else
	    		{
	    			error_tanggal_akhir = '';
	    			$('#error_tanggal_akhir').text(error_tanggal_akhir);
	    			tanggal_akhir = $('#tanggal_akhir').val();
				}
				
				if (error_kuota != '' || error_file != '' || error_tanggal_mulai != '' || error_tanggal_akhir != '')
				{
					Swal.fire({
						icon: 'error',
						title: 'Data belum lengkap!',
						text: 'Mohon lengkapi data terlebih dahulu',
					});
				} 
				else
				{
					Swal.fire({
						title: 'Apakah Kamu Yakin?',
						text: "Kirim Jadwal ini?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						cancelButtonText: 'Batal',
						confirmButtonText: 'Ya, Saya Yakin'
					}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: '<?php echo base_url(); ?>institusi/kirimJadwal',
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
								$('#detailsModal').modal('hide');
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
	