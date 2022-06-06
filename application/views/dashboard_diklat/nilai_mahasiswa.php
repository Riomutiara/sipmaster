		<div class="container-fluid my-5">
			<div class="row-lg-md-sm-12">
				<div class="col-lg-md-sm-12">
					<div class="card shadow">
                        <h4 class="card-header">Rekap Nilai Mahasiswa</h4>
                        <div class="card-body">
							
					    <div class="row">
                            <div class="col-12">
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
							        <th>Nama Pembimbing</th>
							        <th>Institusi Pendidikan</th>
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
	

	
<script type="text/javascript">	
  
	$(document).ready(function(){
		


		// Datatables nilai
		dataTable = $('#tabel_mahasiswa').DataTable({
			"info": false,
			"processing": true,  
			"serverSide": true,  
			"order": [], 
			"ajax":
				{  
			"url":"<?php echo base_url(); ?>diklat/dataNilaiMahasiswa",  
			"type":"POST",
			"data": function(data)
				{
				data.Periode = $('#id_periode').val();
				}                 
			},  
			"columnDefs":[  
				{  		    
				"targets":[0, 10],  
				"orderable":false,  
				},  
			],
			"language":{
				"zeroRecords": "Data Mahasiswa pada periode ini kosong",
				"search": "Nama Mahasiswa :"
			},         	
		});
		// End Datatables nilai

		$(document).on('change', '#id_periode', function(){
			dataTable.ajax.reload();
		});

		$(document).on('click', '.batal', function(){
		var id = $(this).attr('id');

			Swal.fire({
				title: 'Apakah Kamu Yakin?',
				text: "Batalkan nilai ini?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Batal',
				confirmButtonText: 'Ya, Saya yakin!'
			}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: '<?php echo base_url(); ?>diklat/batalNilai',
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

		$(document).on('click', '.kirim', function(){
			var id = $(this).attr('id');

			Swal.fire({
				title: 'Apakah Kamu Yakin?',
				text: "Kirim nilai ini ke Institusi Pendidikan?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Batal',
				confirmButtonText: 'Ya, Saya yakin!'
			}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: '<?php echo base_url(); ?>diklat/kirimNilaiInstitusi',
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
	});
	// End document ready
</script>
	