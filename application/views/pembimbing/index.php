		<div class="container-fluid my-5">
			<div class="card shadow">
				<h4 class="card-header">Daftar Pembimbing</h4>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<button type="submit" id="add_button" class="btn btn-info float-right" data-toggle="modal" data-target="#pembimbingModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;Tambah Data</button>
							<button type="submit" id="add" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="#"><i class="fas fa-table fa-lg"></i>&nbsp;Export</button>			
						</div>
					</div>
					<br>
					<!-- Table -->
					<div class="table-responsive mb-5">
						<table class="table tabled-bordered table-hover table-sm" id="tabel_pembimbing" width="100%">
							<thead class="thead-light">
							<tr>
								<th>No.</th>
								<th>Nama Pembimbing</th>			        
								<th>Ruangan</th>
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

		<!-- Ruangan Modal -->
		<div class="modal fade" id="pembimbingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		  	<form method="post" id="form_pembimbing">
		  		<div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembimbing</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="form-group">
				        <label for="nama_pembimbing">Nama</label>
				        <input type="text" name="nama_pembimbing" id="nama_pembimbing" class="form-control" placeholder="Masukkan nama pembimbing">
				        <small><span class="text-danger" id="error_nama_pembimbing"></span></small>	
			      	</div>
			      	<div class="form-group">
				        <label for="nip">NIP</label>
				        <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP pembimbing">
				        <small><span class="text-danger" id="error_nip"></span></small>	
			      	</div>				      				      				      			      	   
			      	<div class="form-group">
				        <label for="jabatan">Jabatan</label>
				        <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan jabatan pembimbing">
				        <small><span class="text-danger" id="error_jabatan"></span></small>	
			      	</div>
			      	<div class="form-group">
				        <label for="pangkat">Pangkat</label>
				        <select class="form-control" name="pangkat" id="pangkat">
				        	<option selected>Pilih salah satu</option>
				        	<option value="II-A Pengatur Muda">II-A Pengatur Muda</option>
				        	<option value="II-B Pengatur Muda TK 1">II-B Pengatur Muda TK 1</option>
				        	<option value="II-C Pengatur">II-C Pengatur</option>
				        	<option value="II-D Pengatur TK 1">II-D Pengatur TK 1</option>
				        	<option value="III-A Penata Muda">III-A Penata Muda</option>
				        	<option value="III-B Penata Muda TK 1">III-B Penata Muda TK 1</option>
				        	<option value="III-C Penata">III-C Penata</option>
				        	<option value="III-D Penata TK 1">III-D Penata TK 1</option>
				        	<option value="IV-A Pembina">IV-A Pembina</option>
				        	<option value="IV-B Pembina TK 1">IV-B Pembina TK 1</option>
				        	<option value="IV-C Pembina Utama Muda">IV-C Pembina Utama Muda</option>
				        	<option value="IV-D Pembina Utama Madya">IV-D Pembina Utama Madya</option>
				        	<option value="IV-E Pembina Utama">IV-E Pembina Utama</option>
				        </select>
				        <small><span class="text-danger" id="error_pangkat"></span></small>	
			      	</div>
			      	<div class="form-group">
				        <label for="pendidikan">Pendidikan</label>
				        <input type="text" name="pendidikan" id="pendidikan" class="form-control" placeholder="Masukkan pendidikan">
				        <small><span class="text-danger" id="error_pendidikan"></span></small>	
		      		</div>
		      		<div class="form-group">
				        <label for="ruangan">Ruangan</label>
				        <select class="form-control" name="ruangan" id="ruangan">
				        	<option selected>Pilih ruangan</option>
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
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <input type="hidden" name="pembimbing_id" id="pembimbing_id">
			        <input type="hidden" name="btn_action" id="btn_action">
			        <input type="submit" name="action" id="action" class="btn btn-info">
			      </div>
		    	</div>
		  	</form>		    
		  </div>
		</div>
		<!-- End Modal input -->

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
		        NIP   : <p class="text-secondary" id="detail_nip"></p>
				    Jabatan : <p class="text-secondary" id="detail_jabatan"></p>
				    Pangkat : <p class="text-secondary" id="detail_pangkat"></p>
				    Pendidikan : <p class="text-secondary" id="detail_pendidikan"></p>
				  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        </div>
		    </div>
		  </div>
		</div>
						</div>
		<!-- End modal details -->

		<!-- Optional JavaScript -->
    
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#add_button').click(function(){
    			$('#form_pembimbing')[0].reset();
    			$('#btn_action').val('Tambah');
    			$('#action').val('Tambah');
    		});

    		// Datatable
    		var dataTable = $('#tabel_pembimbing').DataTable({
				"processing": true,
				"responsive": true,					
				"serverSide": true,
				"order": [],
				"ajax": {
					url: "<?php echo base_url(); ?>diklat/dataPembimbing",
					type: "POST"
				},
				"columnDefs": [
					{
						"targets": [0, 3],
						"orderable": false,
					}
				],					
			});
			// End Datatable

			// Insert data
			$(document).on('submit', '#form_pembimbing', function(event){
				event.preventDefault();

				var	nama_pembimbing			= $('#nama_pembimbing').val();
				var	nip						= $('#nip').val();
				var	jabatan					= $('#jabatan').val();
				var	pangkat					= $('#pangkat').val();
				var	pendidikan				= $('#pendidikan').val();
				var	ruangan					= $('#ruangan').val();
				var error_nama_pembimbing 	= $('#error_nama_pembimbing').val();
				var error_nip 				= $('#error_nip').val();
				var error_jabatan 			= $('#error_jabatan').val();
				var error_pangkat 			= $('#error_pangkat').val();
				var error_pendidikan 		= $('#error_pendidikan').val();
				var error_ruangan 			= $('#error_ruangan').val();

				// Validasi
				if ($('#nama_pembimbing').val() == '') 
	    		{
	    			error_nama_pembimbing = 'Nama Pembimbing tidak boleh kosong';
	    			$('#error_nama_pembimbing').text(error_nama_pembimbing);
	    			nama_pembimbing = '';
	    		}
	    		else
	    		{
	    			error_nama_pembimbing = '';
	    			$('#error_nama_pembimbing').text(error_nama_pembimbing);
	    			nama_pembimbing = $('#nama_pembimbing').val();
	    		}

	    		if ($('#nip').val() == '') 
	    		{
	    			error_nip = 'NIP Pembimbing tidak boleh kosong ';
	    			$('#error_nip').text(error_nip);
	    			nip = '';
	    		}
	    		else
	    		{
	    			error_nip = '';
	    			$('#error_nip').text(error_nip);
	    			nip = $('#nip').val();
	    		}

	    		if ($('#jabatan').val() == '') 
	    		{
	    			error_jabatan = 'Jabatan tidak boleh kosong';
	    			$('#error_jabatan').text(error_jabatan);
	    			jabatan = '';
	    		}
	    		else
	    		{
	    			error_jabatan = '';
	    			$('#error_jabatan').text(error_jabatan);
	    			jabatan = $('#jabatan').val();
	    		}

	    		if ($('#pangkat').val() == 'Pilih salah satu') 
	    		{
	    			error_pangkat = 'Pilih Pangkat Pembimbing';
	    			$('#error_pangkat').text(error_pangkat);
	    			pangkat = '';
	    		}
	    		else
	    		{
	    			error_pangkat = '';
	    			$('#error_pangkat').text(error_pangkat);
	    			pangkat = $('#pangkat').val();
	    		}

	    		if ($('#pendidikan').val() == '') 
	    		{
	    			error_pendidikan = 'Pendidikan tidak boleh kosong';
	    			$('#error_pendidikan').text(error_pendidikan);
	    			pendidikan = '';
	    		}
	    		else
	    		{
	    			error_pendidikan = '';
	    			$('#error_pendidikan').text(error_pendidikan);
	    			pendidikan = $('#pendidikan').val();
	    		}

	    		if ($('#ruangan').val() == 'Pilih ruangan') 
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
	    		// End Validasi

				if (error_nama_pembimbing != '' || error_nip != '' || error_jabatan != '' || error_pangkat != '' || error_pendidikan != '' || error_ruangan != '')
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
						url: '<?php echo base_url(); ?>diklat/inputPembimbing',
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
							$('#form_pembimbing')[0].reset();
							$('#pembimbingModal').modal('hide');
							dataTable.ajax.reload();
						}
					});
	    		}
				});
				// End insert data

				// Detail data
				$(document).on('click', '.details', function(){
					var pembimbing_id = $(this).attr('id');

					$.ajax({
						url: '<?php echo base_url(); ?>diklat/fetchSinglePembimbing',
						method: 'POST',
						data: {pembimbing_id:pembimbing_id},
						dataType: 'JSON',
						success:function(data)
						{
							$('#detailsModal').modal('show');
							$('.modal-title').text(data.nama_pembimbing);
							$('#detail_nip').text(data.nip);
							$('#detail_jabatan').text(data.jabatan);
							$('#detail_pangkat').text(data.pangkat);
							$('#detail_pendidikan').text(data.pendidikan);
						}
					});
				});
				// End details

				// Update data
	    		$(document).on('click', '.update', function(){
    			var	pembimbing_id = $(this).attr('id');

    			$.ajax({
  					url: '<?php echo base_url(); ?>diklat/fetchSinglePembimbing',
  					method: 'POST',
  					data:{pembimbing_id:pembimbing_id},
  					dataType:'json',
  					success:function(data)
  					{
						$('#pembimbingModal').modal('show');
						$('#nama_pembimbing').val(data.nama_pembimbing);
						$('#nip').val(data.nip);
						$('#jabatan').val(data.jabatan);
						$('#pangkat').val(data.pangkat);
						$('#pendidikan').val(data.pendidikan);
						$('#ruangan').val(data.ruangan);	    							
						$('.modal-title').text('Edit Data Pembimbing');
						$('#pembimbing_id').val(pembimbing_id);
						$('#btn_action').val('Edit');
						$('#action').val('Edit');	    							
  					}
    			});
	    	});
	    	// End update data


	    	// Delete data
	    	$(document).on('click', '.delete', function(){
			var pembimbing_id = $(this).attr('id');
			
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
						url:'<?php echo base_url(); ?>diklat/deletePembimbing',
						method: 'POST',
						data:{pembimbing_id, pembimbing_id},
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
