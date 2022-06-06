		<div class="container my-5">
			<div class="card shadow">
				<div class="card-body">
					<h2 class="text-center">Kalender Diklat RSJ. Prof. HB. Saanin Padang</h2><hr>
					<button	button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-fw fa-calendar-check mr-2"></i>Buat Jadwal</button><hr>
					<div id="calendar"></div>
				</div>
				<!-- End card body -->
			</div>			
			<!-- End card -->
		</div>
		<!-- End container -->

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Buat Jadwal</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="post" id="form_jadwal">
						<input type="hidden" name="username" id="username" value="<?php echo $user['username'] ?>">
						<input type="hidden" name="institusi_id" id="institusi_id" value="<?php echo $user['institusi_id']; ?>">
						<div class="row">
							<div class="col">								  
								<div class="form-group">
									<label for="nama_jadwal">Kode Jadwal</label>
									<input type="text" name="nama_jadwal" id="nama_jadwal" class="form-control" value="D00<?php echo $user['institusi_id'], - random_string('numeric', 6); ?>" readonly>								
									<small><span class="text-danger" id="error_nama_jadwal"></span></small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">								  
								<div class="form-group">
									<label for="volume">Jumlah Mahasiswa</label>
									<input type="number" name="volume" id="volume" class="form-control" placeholder="Kuota">									
									<small><span class="text-danger" id="error_volume"></span></small>
								</div>
							</div>
						</div>					  							  		
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="tanggal_mulai">Tanggal Mulai</label>
									<div class="input-group date" id="datetimepicker1"data-target-input="nearest">
										<input type="text" class="form-control datetimepicker-input" name="tanggal_mulai" id="tanggal_mulai" data-target="#datetimepicker1" placeholder="Tanggal mulai" autocomplete="off">
										<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>          
										</div>
									</div>
									<small><span class="text-danger" id="error_tanggal_mulai"></span></small>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="tanggal_akhir">Tanggal Berakhir</label>
									<div class="input-group date" id="datetimepicker2"data-target-input="nearest">
										<input type="text" class="form-control datetimepicker-input" name="tanggal_akhir" id="tanggal_akhir" data-target="#datetimepicker2" placeholder="Tanggal berakhir" autocomplete="off">
										<div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>					                
										</div>
									</div>
									<small><span class="text-danger" id="error_tanggal_akhir"></span></small>
								</div>
							</div>					        		
						</div>																																						
					</div>
					<div class="modal-footer">
						<input type="hidden" name="jadwal_id" id="jadwal_id">
						<input type="hidden" name="btn_action" id="btn_action">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<input type="submit" name="action" id="action" class="btn btn-info" value="Submit">								
					</div>
					</form>
				</div>
			</div>			
		</div>
		<!-- End Modal -->
	</div>

	<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.datetimepicker.full.min.js"></script>
		
    <script type="text/javascript">
    	// Datetimepicker
    	$('#tanggal_mulai').datetimepicker({
    		timepicker: false,
    		datepicker: true,
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
    		theme: 'dark',
    		format: 'd-m-Y',
    		onShow: function(ct){
    			this.setOptions({
    				minDate: $('#tanggal_mulai').val() ? $('#tanggal_mulai').val() :false
    			})
    		}
    	})
		// End datetimepicker
		
		

    	// Document ready
    	$(document).ready(function(){
			// kelender
			var calendar = $('#calendar').fullCalendar({
				editable:false,
				header:{
					left:'title',
                center:'',
                right:'prev,next today'
				},
				events:"<?php echo base_url(); ?>institusi/loadcalendar",
				eventColor: 'yellow',
				selectable:true,
				selectHelper:true
			});
			// End kalender
			
			// Insert jadwal
			$(document).on('submit', '#form_jadwal', function(event){
			event.preventDefault();

				var tanggal_mulai 			= $('#tanggal_mulai').val();
				var tanggal_akhir 			= $('#tanggal_akhir').val();
				var nama_jadwal 			= $('#nama_jadwal').val();
				var jurusan 				= $('#jurusan').val();
				var jenis_praktek 			= $('#jenis_praktek').val();
				var volume 					= $('#volume').val();				
				var error_tanggal_mulai 	= $('#error_tanggal_mulai').val();
				var error_tanggal_akhir 	= $('#error_tanggal_akhir').val();
				var error_nama_jadwal		= $('#error_nama_jadwal').val();
				var error_jurusan			= $('#error_jurusan').val();
				var error_jenis_praktek		= $('#error_jenis_praktek').val();
				var error_volume			= $('#error_volume').val();

	    		if ($('#tanggal_mulai').val() == '')
	    		{
	    			error_tanggal_mulai = 'Pilih tanggal mulai';
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
	    			error_tanggal_akhir = 'Pilih tanggal akhir';
	    			$('#error_tanggal_akhir').text(error_tanggal_akhir);
	    			tanggal_akhir = '';    			
	    		}
	    		else
	    		{
	    			error_tanggal_akhir = '';
	    			$('#error_tanggal_akhir').text(error_tanggal_akhir);
	    			tanggal_akhir = $('#tanggal_akhir').val();
	    		}

	    		if ($('#nama_jadwal').val() == '')
	    		{
	    			error_nama_jadwal = 'Pilih Nama jadwal';
	    			$('#error_nama_jadwal').text(error_nama_jadwal);
	    			nama_jadwal = '';    			
	    		}
	    		else
	    		{
	    			error_nama_jadwal = '';
	    			$('#error_nama_jadwal').text(error_nama_jadwal);
	    			nama_jadwal = $('#nama_jadwal').val();
	    		}

	    		if ($('#jurusan').val() == 'Pilih Jurusan')
	    		{
	    			error_jurusan = 'Harap diisi jurusan';
	    			$('#error_jurusan').text(error_jurusan);
	    			jurusan = '';    			
	    		}
	    		else
	    		{
	    			error_jurusan = '';
	    			$('#error_jurusan').text(error_jurusan);
	    			jurusan = $('#jurusan').val();
	    		}

	    		if ($('#jenis_praktek').val() == 'Pilih Jenis Praktek')
	    		{
	    			error_jenis_praktek = 'Harap diisi jenis praktek';
	    			$('#error_jenis_praktek').text(error_jenis_praktek);
	    			jenis_praktek = '';    			
	    		}
	    		else
	    		{
	    			error_jenis_praktek = '';
	    			$('#error_jenis_praktek').text(error_jenis_praktek);
	    			jenis_praktek = $('#jenis_praktek').val();
				}
				
				if ($('#volume').val() == '')
	    		{
	    			error_volume = 'Kuota tidak boleh kosong';
	    			$('#error_volume').text(error_volume);
	    			volume = '';    			
	    		}
	    		else
	    		{
	    			error_volume = '';
	    			$('#error_volume').text(error_volume);
	    			volume = $('#volume').val();
	    		}

			if (error_tanggal_mulai != '' || error_tanggal_akhir != '' || error_nama_jadwal != '' || error_volume != '') 
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
				url: '<?php echo base_url(); ?>institusi/inputJadwal',
				method:'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success:function(data)
					{
						Swal.fire({
							title: 'Berhasil!',
							text: "Jadwal telah berhasil dibuat, anda akan diarahkan kehalaman input mahasiswa",
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							cancelButtonText: 'Batal',
							confirmButtonText: 'Ya, Input Mahasiswa'
						}).then((result) => {
						if (result.isConfirmed){
							window.location.href = '<?php echo base_url(); ?>institusi/mahasiswa';
						}
						})
						$('#nama_jadwal').val('');
						$('#volume').val('');
						$('#tanggal_mulai').val('');
						$('#tanggal_akhir').val('');
						$('#exampleModal').modal('hide');
					}
				});
			}
			});
			// End insert jadwal     	    		
    	});
    	// End Document ready
    </script>
