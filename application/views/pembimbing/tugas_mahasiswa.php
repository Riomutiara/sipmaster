		<input type="hidden" name="id_user" id="id_user" value="<?= $user['institusi_id']; ?>">
		<div class="container-fluid my-5">
			<div class="row-lg-md-sm-12">
				<div class="col-lg-md-sm-12">
					<div class="card shadow">
						<h4 class="card-header">Tugas Mahasiswa</h4>
						<div class="card-body">
							<div class="table-responsive mb-5">
								<table class="table tabled-bordered table-hover table-sm" id="tabel_tugas_mahasiswa" width="100%">
									<thead class="thead-light">
										<tr>
											<th>No.</th>
											<th>Judul</th>
											<th>Nama Mahasiswa</th>
											<th>File</th>
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

		<script>
			$(document).ready(function() {
				// Datatables mahasiswa
				dataTable = $('#tabel_tugas_mahasiswa').DataTable({
					"info": false,
					"processing": true,
					"serverSide": true,
					"order": [],
					"ajax": {
						"url": "<?php echo base_url(); ?>pembimbing/tabelTugasMahasiswa",
						"type": "POST",
						"data": function(data) {
							data.Pembimbing = $('#id_user').val();
						}
					},
					"columnDefs": [{
						"targets": [0],
						"orderable": false,
					}, ],
					"language": {
						"zeroRecords": "Data Mahasiswa kosong",
						"search": "Nama Mahasiswa :"
					},
				});


				// 	Detail nilai
				$(document).on('click', '.edit', function() {
					var mahasiswa_id = $(this).attr('id');
					$.ajax({
						url: '<?php echo base_url(); ?>pembimbing/fetchSingleNilai',
						method: 'POST',
						data: {
							mahasiswa_id: mahasiswa_id
						},
						dataType: 'JSON',
						success: function(data) {
							$('#nilaiModal').modal('show');
							$('#mahasiswa_id').val(mahasiswa_id);
							$('#action').val('Edit_nilai');
							$('#nilai_angka').val(data.nilai_angka);
							$('#nilai_huruf').val(data.nilai_huruf);
							$('#keterangan').val(data.keterangan);
						}
					});
				});
				// End details

				// Kirim nilai
				$(document).on('click', '.kirim', function() {
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
								data: {
									id: id
								},
								success: function(data) {
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
				$(document).on('submit', '#form_input_nilai', function(event) {
					event.preventDefault();

					var angka = $('#nilai_angka').val();
					var huruf = $('#nilai_huruf').val();
					var keterangan = $('#nilai_huruf').val();
					var error_nilai_angka = $('#error_nilai_angka').val();
					var error_nilai_huruf = $('#error_nilai_huruf').val();
					var error_keterangan = $('#error_keterangan').val();

					if ($('#nilai_angka').val() == '') {
						error_nilai_angka = 'Nilai Angka tidak boleh kosong';
						$('#error_nilai_angka').text(error_nilai_angka);
						nilai_angka = '';
					} else {
						error_nilai_angka = '';
						$('#error_nilai_angka').text(error_nilai_angka);
						nilai_angka = $('#nilai_angka').val();
					}

					if ($('#nilai_huruf').val() == '') {
						error_nilai_huruf = 'Nilai Huruf tidak boleh kosong';
						$('#error_nilai_huruf').text(error_nilai_huruf);
						nilai_huruf = '';
					} else {
						error_nilai_huruf = '';
						$('#error_nilai_huruf').text(error_nilai_huruf);
						nilai_huruf = $('#nilai_huruf').val();
					}

					if ($('#keterangan').val() == '') {
						error_keterangan = 'Kalau tidak ada Keterangan, diisi dengan tanda (-)';
						$('#error_keterangan').text(error_keterangan);
						keterangan = '';
					} else {
						error_keterangan = '';
						$('#error_keterangan').text(error_keterangan);
						keterangan = $('#keterangan').val();
					}


					if (error_nilai_angka != '' || error_nilai_huruf != '' || error_keterangan != '') {
						Swal.fire({
							icon: 'error',
							title: 'Data belum lengkap!',
							text: 'Nilai tidak boleh kosong',
						});
					} else {
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
									method: 'POST',
									data: new FormData(this),
									contentType: false,
									processData: false,
									success: function(data) {
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


				// End approve jadwal
				$(document).on('click', '.lihat_nilai', function() {
					var id = $(this).attr('id');
					var filepdf = $(this).attr('file');
					console.log([id, filepdf]);
					$.ajax({
						url: '<?php echo base_url(); ?>pembimbing/updateStatusTugas',
						method: 'POST',
						data: {
							id: id
						},
						success: function(data) {
							window.open('<?php echo base_url('assets/documents/tugasmahasiswa/') ?>' + filepdf)
						}
					});
				});
			});
			// End document ready
		</script>