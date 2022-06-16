		<div class="container my-5">
			<div class="card shadow">
				<h4 class="card-header">Upload</h4>
				<div class="card-body">
					<form action="post" id="form_tugas">
						<input type="hidden" name="id_user" id="id_user" value="<?php echo $user['username']; ?>">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="pembimbing">Cari</label>
									<select class="form-control" id="pembimbing" name="pembimbing">
										<option selected>Pilih Pembimbing</option>
										<?php
										foreach ($pembimbing as $row) {
											echo '<option value="' . $row->pembimbing_id . '">' . $row->pembimbing_nama . '</option>';
										}
										?>
									</select>
									<small><span class="text-danger" id="error_pembimbing"></span></small>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="judul">Judul Tugas/LP/LK/Seminar/Proposal TAK</label>
							<input type="text" name="judul" id="judul" class="form-control">
							<small><span class="text-danger" id="error_judul"></span></small>
						</div>
						<div class="form-group">
							<label for="catatan">Catatan</label>
							<textarea id="catatan" name="catatan" class="form-control"></textarea>
							<small><span class="text-danger" id="error_catatan"></span></small>
						</div>
						<div class="row">
							<div class="col-6">
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
						</div>
						<div class="form-group">
							<input type="submit" name="action" id="action" class="btn btn-info" value="Simpan">
						</div>
					</form>
					<!-- End Form -->
					<br>
					<!-- Tabel -->
					<div class="table-responsive mb-5">
						<table class="table tabled-bordered table-sm" id="tabel_tugas_mahasiswa" width="100%">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>Judul</th>
									<th>Pembimbing</th>
									<th>File</th>
									<th>Status</th>
								</tr>
							</thead>
						</table>
					</div>
					<!-- End Table -->
				</div>
				<!-- End Body -->
			</div>
		</div>
		<!-- End Container -->

		<script type="text/javascript">
			var dataTable;

			$(document).ready(function() {
				// Datatables
				dataTable = $('#tabel_tugas_mahasiswa').DataTable({
					"info": false,
					"processing": true,
					"serverSide": true,
					"paging": false,
					"order": [],
					"ajax": {
						"url": "<?php echo base_url(); ?>mahasiswa/tabelTugas",
						"type": "POST",
						"data": function(data) {
							data.Username = $('#username').val();
						}
					},
					"columnDefs": [{
						"targets": [0],
						"orderable": false,
					}, ],
					"language": {
						"zeroRecords": "Data Mahasiswa kosong",
						"search": "Judul :"
					},
				});
				// End Datatables

				$(document).on('submit', '#form_tugas', function(event) {
					event.preventDefault();

					var pembimbing = $('#pembimbing').val();
					var judul = $('#judul').val();
					var catatan = $('#catatan').val();

					var error_pembimbing = $('#error_pembimbing').val();
					var error_judul = $('#error_judul').val();

					if ($('#pembimbing').val() == 'Pilih Pembimbing') {
						error_pembimbing = 'Pilih Pembimbing';
						$('#error_pembimbing').text(error_pembimbing);
						pembimbing = '';
					} else {
						error_pembimbing = '';
						$('#error_pembimbing').text(error_pembimbing);
						pembimbing = $('#pembimbing').val();
					}

					if ($('#judul').val() == '') {
						error_judul = 'Pilih Judul';
						$('#error_judul').text(error_judul);
						judul = '';
					} else {
						error_judul = '';
						$('#error_judul').text(error_judul);
						judul = $('#judul').val();
					}

					if (error_pembimbing != '' || error_judul != '') {
						Swal.fire({
							icon: 'error',
							title: 'Data belum lengkap!',
							text: 'Mohon lengkapi data terlebih dahulu',
						});
					} else {
						$.ajax({
							url: '<?php echo base_url(); ?>mahasiswa/inputTugas',
							method: 'POST',
							data: new FormData(this),
							contentType: false,
							processData: false,
							success: function(data) {
								Swal.fire({
									icon: 'success',
									title: data,
									// timer: 1500
								})
								// $('#nama_mahasiswa').val('');
								// $('#npm').val('');
								// $('#jenis_kelamin').val('Pilih Jenis Kelamin');
								dataTable.ajax.reload();
							}
						});
					}
				});
				// End insert jadwal



				// Delete data
				$(document).on('click', '.hapus_tugas', function() {
					var id = $(this).attr('id');
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
								url: '<?php echo base_url(); ?>mahasiswa/hapusTugas',
								method: 'POST',
								data: {
									id,
									id
								},
								success: function(data) {
									if (data == 1) {
										Swal.fire({
											icon: 'error',
											title: 'Gagal hapus, file sudah diterima oleh Pembimbing',
											showConfirmButton: false,
											timer: 1500
										})
										dataTable.ajax.reload();
									} else {
										Swal.fire({
											icon: 'success',
											title: 'Data berhasil dihapus',
											showConfirmButton: false,
											timer: 1500
										})
										dataTable.ajax.reload();
									}
								}
							});
						}
					})
				});
				// End Delete Data	
			});
			// End document ready
		</script>