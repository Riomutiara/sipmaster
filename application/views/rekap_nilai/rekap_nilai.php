<div class="container-fluid my-5">
			<div class="row-lg-md-sm-12">
				<div class="col-lg-md-sm-12">
					<div class="card shadow">
					  <h4 class="card-header">Rekap Nilai Mahasiswa</h4>
					  <div class="card-body">
					  	<input type="hidden" name="username" id="username" value="<?php echo $user['username']; ?>">
					  	<input type="hidden" name="id_pembimbing" id="id_pembimbing" value="<?php echo $user['institusi_id']; ?>">
					  	<div class="form-group">
                            <label for="jadwal">Jadwal</label>
                            <select class="form-control" id="jadwal" name="jadwal"></select>									                                  
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
							        <!-- <th>Status</th> -->
							        <!-- <th>Action</th>-->					 					        		    
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
		// SelectPicker data jadwal
		var username=$('#username').val();
		$.ajax({
			url : "<?php echo base_url();?>institusi/getJadwal",
			method : "POST",
			data : {username: username},
			async : false,
			dataType : 'json',
			success: function(data){
				var html = '';
				var i;
				html += '<option selected>Pilih Kode Jadwal</option>';
				for(i=0; i<data.length; i++){
					html += '<option value="'+data[i].jadwal_id+'">'+data[i].jadwal_nama+'</option>';
				}
				$('#jadwal').html(html);		
			}
		});

		// Datatables nilai
		dataTable = $('#tabel_mahasiswa').DataTable({
			"info": false,
			"processing": true,  
			"serverSide": true,  
			"order": [], 
			"ajax":
				{  
			"url":"<?php echo base_url(); ?>institusi/rekapNilai",  
			"type":"POST",
			"data": function(data)
				{
				data.Jadwal = $('#jadwal').val();
				}                 
			},  
			"columnDefs":[  
				{  		    
				"targets":[0],  
				"orderable":false,  
				},  
			],
			"language":{
				"zeroRecords": "Data Mahasiswa pada periode ini kosong",
				"search": "Nama Mahasiswa :"
			},         	
		});
		// End Datatables nilai

		$(document).on('change', '#jadwal', function(){
			dataTable.ajax.reload();
		});
	});
	// End document ready
</script>
	