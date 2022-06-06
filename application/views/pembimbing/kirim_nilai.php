		<div class="container-fluid my-5">
			<div class="row-lg-md-sm-12">
				<div class="col-lg-md-sm-12">
					<div class="card shadow">
					  <h4 class="card-header">Kirim Nilai Mahasiswa</h4>
					  <div class="card-body">
					  	<input type="hidden" name="username" id="username" value="<?php echo $user['username']; ?>">
						<input type="hidden" name="id_pembimbing" id="id_pembimbing" value="<?php echo $user['institusi_id']; ?>">
						<div class="row">
							<div class="col">
								<div class="form-group">									
									<label for="id_periode">Periode</label>
									<select class="form-control" id="id_periode" name="id_periode">
										<option selected>Pilih Periode</option>				
										<?php 
											foreach ($periode as $row) 
											{
												echo '<option value="'.$row->periode_id.'">'.$row->periode_nama.'</option>';
											}
										?>	 								    					     
									</select>
								</div>
							</div>
						</div>
						<br>	
					 
					    <!-- Tabel -->
					  	<div class="table-responsive mb-5">
							<table class="table tabled-bordered table-hover table-sm" id="tabel_mahasiswa" width="100%">
							    <thead class="thead-light">
							      <tr>
							      	<th>No.</th>
							      	<th>Nama Mahasiswa</th>
							        <th>NPM</th>
							        <th>Jenis Kelamin</th>
							        <th>Nilai Angka</th>
							        <th>Nilai Huruf</th>
							        <th>Keterangan</th>
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
		<div class="modal fade" id="nilaiModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title" id="staticBackdropLabel">Edit Nilai Mahasiswa</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" id="form_input_nilai">
				<div class="modal-body">
				<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="nilai_angka">Nilai Angka : </label>
								<input type="text" pattern="^\d*(\.\d{0,2})?$" name="nilai_angka" id="nilai_angka" class="form-control">
								<small id="emailHelp" class="form-text text-muted">Koma diisi dengan tanda titik ( . ), Contoh 75.50.</small>
								<small><span class="text-danger" id="error_nilai_angka"></span></small>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="nilai_huruf">Nilai Huruf :</label>
								<select class="form-control" id="nilai_huruf" name="nilai_huruf">
									<option selected>Nilai Huruf</option>
									<option value="A">A</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B">B</option>
									<option value="B-">B-</option>
									<option value="C+">C+</option>
									<option value="C">C</option>
									<option value="C-">C-</option>
								</select>
								<small><span class="text-danger" id="error_nilai_huruf"></span></small>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" name="keterangan" id="keterangan" class="form-control">
						<small><span class="text-danger" id="error_keterangan"></span></small>
					</div>														
				  </div>
		      	<div class="modal-footer">
		      		<input type="hidden" name="mahasiswa_id" id="mahasiswa_id">
		      		<input type="hidden" name="action" id="action">		          	      	      
					<button type="submit" name="btn_action" id="btn_action" class="btn btn-info"><i class="fas fa-download mr-2"></i>Simpan Nilai</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="batal">Tutup</button>	 
		      	</div>	
		      </form>	      
		    </div>
		  </div>
		</div>
		<!-- End modal details -->
	
  <script type="text/javascript">	
  
  		$(document).ready(function(){
			
			// Input Desimal
			$(document).on('keydown', 'input[pattern]', function(e){
				var input = $(this);
				var oldVal = input.val();
				var regex = new RegExp(input.attr('pattern'), 'g');

				setTimeout(function(){
					var newVal = input.val();
					if(!regex.test(newVal)){
					input.val(oldVal); 
					}
				}, 0);
			});

			$(document).on('change', '#id_periode', function(){
				dataTable.ajax.reload();
			});



			// Nilai huruf otomatis
			// $(document).on('change', '#nilai_angka', function(){
			// 	var angka = $('#nilai_angka').val();

			// 	if(angka >= 80)
			// 	{
			// 		$('#nilai_huruf').val('A');
			// 	}
			// 	if(angka < 80 && angka >= 70)
			// 	{
			// 		$('#nilai_huruf').val('B');
			// 	}
			// 	if(angka < 70)
			// 	{
			// 		$('#nilai_huruf').val('C');
			// 	}
			// 	if(angka == 0)
			// 	{
			// 		$('#nilai_huruf').val('');
			// 	}		
			// });
			

    		// Datatables mahasiswa
			dataTable = $('#tabel_mahasiswa').DataTable({
				"info": false,
				"processing": true,  
				"serverSide": true,  
				"order": [], 
				"ajax":
					{  
	            "url":"<?php echo base_url(); ?>pembimbing/tabelKirimMahasiswa",  
	            "type":"POST",
	            "data": function(data)
					{
					data.Pembimbing = $('#id_pembimbing').val();
					data.Periode = $('#id_periode').val();
					}                 
	          	},  
				"columnDefs":[  
					{  		    
					"targets":[0, 8],  
					"orderable":false,  
					},  
				],
				"language":{
					"zeroRecords": "Data Mahasiswa kosong",
					"search": "Nama Mahasiswa :"
				},         	
			});
  			// End Datatables jadwal

  			  			
  			// 	Detail nilai
			$(document).on('click', '.edit', function(){			
				var mahasiswa_id = $(this).attr('id');
				$.ajax({
					url: '<?php echo base_url(); ?>pembimbing/fetchSingleNilai',
					method: 'POST',
					data: {mahasiswa_id:mahasiswa_id},
					dataType: 'JSON',
					success:function(data)
					{						 
						$('#nilaiModal').modal('show');
						$('#mahasiswa_id'  ).val(mahasiswa_id);
						$('#action').val('Edit_nilai');
						$('#nilai_angka').val(data.nilai_angka);
						$('#nilai_huruf').val(data.nilai_huruf);
						$('#keterangan').val(data.keterangan);
					}
				});												
			});
			// End details

			// Kirim nilai
			$(document).on('click', '.kirim', function(){
			var id = $(this).attr('id');

			Swal.fire({
					title: 'Apakah Kamu Yakin?',
					text: "Kirim Nilai ini?",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Batal',
					confirmButtonText: 'Ya, Saya yakin!'
				}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: '<?php echo base_url(); ?>pembimbing/kirimNilai',
						method: 'POST',
						data: {id:id},
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
			// End kirim nilai
			
	    	// Edit nilai mahasiswa
	    	$(document).on('submit', '#form_input_nilai', function(event){
				event.preventDefault();
				
				var	angka = $('#nilai_angka').val();
				var huruf = $('#nilai_huruf').val();
				var keterangan = $('#nilai_huruf').val();
				var error_nilai_angka = $('#error_nilai_angka').val();
				var error_nilai_huruf = $('#error_nilai_huruf').val();
				var error_keterangan = $('#error_keterangan').val();

				if ($('#nilai_angka').val() == '') 
				{
					error_nilai_angka = 'Nilai Angka tidak boleh kosong';
					$('#error_nilai_angka').text(error_nilai_angka);
					nilai_angka = '';
				}
				else
				{
					error_nilai_angka = '';
					$('#error_nilai_angka').text(error_nilai_angka);
					nilai_angka = $('#nilai_angka').val();
				}

				if ($('#nilai_huruf').val() == '') 
				{
					error_nilai_huruf = 'Nilai Huruf tidak boleh kosong';
					$('#error_nilai_huruf').text(error_nilai_huruf);
					nilai_huruf = '';
				}
				else
				{
					error_nilai_huruf = '';
					$('#error_nilai_huruf').text(error_nilai_huruf);
					nilai_huruf = $('#nilai_huruf').val();
				}

				if ($('#keterangan').val() == '') 
				{
					error_keterangan = 'Kalau tidak ada Keterangan, diisi dengan tanda (-)';
					$('#error_keterangan').text(error_keterangan);
					keterangan = '';
				}
				else
				{
					error_keterangan = '';
					$('#error_keterangan').text(error_keterangan);
					keterangan = $('#keterangan').val();
				}


				if (error_nilai_angka != '' || error_nilai_huruf != '' || error_keterangan != '')
				{
					Swal.fire({
						icon: 'error',
						title: 'Data belum lengkap!',
						text: 'Nilai tidak boleh kosong',
					});
				} 
				else
				{
					Swal.fire({
						title: 'Apakah Kamu Yakin?',
						text: "Edit Nilai ini?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						cancelButtonText: 'Batal',
						confirmButtonText: 'Ya, Saya yakin!'
					}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: '<?php echo base_url(); ?>pembimbing/inputNilai',
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
								$('#form_input_nilai')[0].reset();			
								$('#nilaiModal').modal('hide');
								dataTable.ajax.reload();								
							}
						});
					}
					})			
				}
				});
				// End edit nilai mahasiswa
    	});
    	// End document ready

		
    </script>
	