    <div class="container my-5">		
		<div class="card shadow">
			<h4 class="card-header">Uraian Tugas & Tanggungjawab Mahasiswa Diklat</h4>
			<div class="card-body">  		
			  	<form action="post" id="form_uraian_tugas">
                    <input type="hidden" name="id_periode" id="id_periode" value="periode">
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <select name="periode" id="periode" class="form-control">
                        <option selected>Pilih Periode</option>
                            <?php 
                            foreach ($periode as $row) 
                            {
                                echo '<option value="'.$row->periode_id.'">'.$row->periode_nama.'</option>';
                            }
                        ?>	 	
                        </select>
                        <small><span class="text-danger" id="error_periode"></span></small>				    
                    </div>	

                    <!-- Table Mahasiswa -->
                    <div class="table-responsive mb-5">
                        <table class="table tabled-bordered table-hover table-sm" id="tabel_kelompok" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Kelompok</th>
                                    <th>Nama Mahasiswa</th>			        
                                    <th>NPM</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Ruangan</th>
                                    <th>Pembimbing Klinik</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>					    		    
                        </table>	
                    </div>
                    <!-- End Table -->
                    
                  
					<!-- Summernote -->                 
					<div class="form-group">
                        <label for="uraian">Uraian Tugas</label>
                        <a href="#" id="'.$row->kelompok_id.'" class="text-info btn_uraian_tugas" data-toggle="modal" title="Bersihkan Konten"><i class="fas fa-sync-alt ml-1"></i></a>
                        <textarea id="uraian_tugas" name="uraian_tugas" class="form-control"></textarea>
                    </div>
					<!-- End Summernote -->
					
                    <div class="row">
						<div class="col-12">
							<div class="form-group">
								<button type="submit" name="btn_action" id="btn_action" class="btn btn-info btn-block"><i class="fas fa-paper-plane mr-2"></i>Kirim Mahasiswa ke Pembimbing</button>
							</div>
						</div>
					</div>		
                </form>
            </div>
            <!-- End card body -->
        </div>
        <!-- End card -->
    </div>
    <!-- End container -->
</div>

<script>
    $(document).ready(function(){

        // CHANGE DATA
			$(document).on('change', '#periode', function(){
				var periode = $('#periode').val();
               
				$('#id_periode').val(periode);
				dataTable.ajax.reload();    

                var	id = $('#id_periode').val();
    			$.ajax({
  					url: '<?php echo base_url(); ?>diklat/fetchUraianTugas',
  					method: 'POST',
  					data:{id:id},
  					dataType:'json',
  					success:function(data)
  					{
						$("#uraian_tugas").summernote('code', data.keterangan); 							
  					}
    			});
			});

			$(document).on('change', '#id_periode', function(){
				dataTable.ajax.reload();

                var	id = $('#id_periode').val();
    			$.ajax({
  					url: '<?php echo base_url(); ?>diklat/fetchUraianTugas',
  					method: 'POST',
  					data:{id:id},
  					dataType:'json',
  					success:function(data)
  					{
						$("#uraian_tugas").summernote('code', data.keterangan); 							
  					}
    			});
			});
			// END CHANGE DATA

        // Datatables
        dataTable = $('#tabel_kelompok').DataTable({
        "info":false,
        "processing":true,  
        "serverSide":true,  
        "order":[], 
        "ajax":
            {  
                "url":"<?php echo base_url(); ?>diklat/dataKelompokUraianTugas",  
                "type":"POST",
                "data": function(data)
                {
                    data.Periode = $('#id_periode').val();
                }  
            },  
        "columnDefs":[  
                {  		    
                    "targets":[0],  
                    "orderable":false,  
                }  
            ],
        "language":{
                "zeroRecords": "Data Mahasiswa pada periode ini tidak ada",
            },
        });
        // End Datatables

        // Clear content
        $(document).on('click', '.btn_uraian_tugas', function(){    
			$("#uraian_tugas").summernote('code', ''); 								
        });
        // End Content



        $('#uraian_tugas').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ],
        });

        // Kirim Data 
        $(document).on('submit', '#form_uraian_tugas', function(event){
        event.preventDefault();

            var periode             = $('#periode').val();
            var tugas_individu      = $('#tugas_individu').val();
            var tugas_kelompok      = $('#tugas_kelompok').val();
            var disiplin            = $('#disiplin').val();
            var pembimbing          = $('#pembimbing').val();
            var keterangan          = $('#keterangan').val();
            var penggantian_dinas   = $('#penggantian_dinas').val();
            var error_periode       = $('#error_periode').val();
            var error_periode       = $('#error_periode').val();

            if ($('#periode').val() == 'Pilih Periode') 
            {
                error_periode = 'Pilih Periode';
                $('#error_periode').text(error_periode);
                periode = '';
            }
            else
            {
                error_periode = '';
                $('#error_periode').text(error_periode);
                periode = $('#periode').val();
            }
            

            if (error_periode != '')
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
						url: '<?php echo base_url(); ?>diklat/inputUraianTugas',
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
                            setTimeout(function(){// wait for 5 secs(2)
								location.reload(); // then reload the page.(3)
							}, 3000);
						}
					});
				}
        
        });
        // End kirim data
        
    });
    // End document ready
    
</script>
        