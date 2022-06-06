        <div class="container-fluid my-5">
			<div class="card shadow">
				<h4 class="card-header">Approve User</h4>
				<div class="card-body">		
					<div class="row">
						<div class="col-md-12">
							<!-- <button type="submit" id="button_approve" class="btn btn-info float-right" data-toggle="modal" data-target="#approveModal"><i class="fas fa-user fa-lg" title="Tambah Data Pembimbing"></i><i class="fas fa-plus fa-sm ml-1"></i></button>															 -->
						</div>
					</div>
					<br>
					<!-- Table -->
					<div class="table-responsive mb-5">
						<table class="table tabled-bordered table-hover table-sm" id="tabel_approval" width="100%">
							<thead class="thead-light">
							<tr>
								<th>No.</th>
								<th>Username</th>
								<th>Nama Akun</th>					        
								<th>Keterangan</th>
								<th>Status</th>
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

        <!-- Modal registrasi -->
		<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		  	<form method="post" id="form_approval">
		  		<div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="form-group">
			      		<label for="username">Username</label>
			      		<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" readonly>
			      		<span class="text-danger" id="error_username"></span>
			      	</div>			      	
			      	<div class="form-group">
			      		<label for="nama_akun">Nama Akun</label>
			      		<input type="text" name="nama_akun" id="nama_akun" class="form-control" placeholder="Masukkan Nama Akun" readonly>
			      		<span class="text-danger" id="error_nama_akun"></span>
                      </div>
                    <div class="form-group">
				        <label for="status">Status</label>
				        <select class="form-control" id="status" name="status">
						      <option value="Aktif">Aktif</option>
						      <option value="Tidak Aktif">Tidak Aktif</option>
						</select>		      		
					</div>	        		         
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <input type="hidden" name="user_id" id="user_id">
			        <input type="hidden" name="btn_action" id="btn_action">
			        <input type="submit" name="action" id="action" class="btn btn-info">
			      </div>
		    	</div>
		  	</form>		    
		  </div>
		</div>
        <!-- End Modal -->

    </div>

        <script>
            $(document).ready(function(){
                // Datatable
                var dataTable = $('#tabel_approval').DataTable({
                "processing": true,
                "responsive": true,
                "info": false,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo base_url(); ?>registrasi/tabelRegistrasiSupervisor",
                    type: "POST"
                },
                "columnDefs": [
                        {
                            "targets": [0, 5],
                            "orderable": false,
                        }
                    ],					
                });
                // End Datatable

                // Fetch single data
				$(document).on('click', '.update', function(){
					var user_id = $(this).attr('id');

					$.ajax({
						url: '<?php echo base_url(); ?>registrasi/fetchSingleInstitusi',
						method: 'POST',
						data: {user_id:user_id},
						dataType: 'json',
						success:function(data)
						{
							$('#approveModal').modal('show');
							$('.modal-title').text('Approve User');
							$('#btn_action').val('Approve_user');

							
							
							$('#username').val(data.username);
							$('#nama_akun').val(data.nama_akun);							
						    $('#user_id').val(user_id);
						    $('#status').val(data.status);
							
							if ($('#status').val() == 'Tidak Aktif') 
							{
								$('#action').val('Aktifkan User');	
							}
							else
							{
								$('#action').val('Non Aktifkan User');
							}			
						}
					});
				});
                // End fetch single

                // Approve Data
                $(document).on('submit', '#form_approval' ,function(event){
                event.preventDefault();
                
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Batal',
                        confirmButtonText: 'Ya, Saya yakin'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        url: '<?php echo base_url(); ?>registrasi/inputUser',
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
                                $('#form_approval')[0].reset();
                                $('#approveModal').modal('hide');
                                dataTable.ajax.reload();						
                            }
                        });
                    }
                    })	
                });
                // End approve
            });
            // End document ready
        </script>
        
       