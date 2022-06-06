  <div class="container my-5">    
      <h4 class="font-weight m-1"><?= $title; ?></h4>
        <div class="row">
            <div class="col-lg-12">
              <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
   
    <div class="card shadow">
        <div class="mx-auto my-4" style="width: 10rem;">
          <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img mb-4 rounded-circle">
        </div>
        <div class="card text-center">
            <div class="col">
                <div class="card-body ">           
                  <p class="card-text"><?= $user['nama_akun']; ?></p>                  
                  <p class="card-text">User Name : <?= $user['username']; ?></p>                  
                  <p class="card-text">ID User : 00<?= $user['institusi_id']; ?></p>
                  <input type="hidden" id="id_institusi" value="<?= $user['institusi_id']; ?>">
                  <input type="hidden" id="id_role" value="<?= $user['role_id']; ?>">
                  <p class="card-text"><?= $user['keterangan']; ?></p>
                  <p class="card-text"><small class="text-muted"></small></p>
									
                  <button type="button" id="add_button" class="btn btn-info" data-toggle="modal" data-target="#detailsModal"><i class="fas fa-info-circle fa-lg"></i>&nbsp;Detail User</button>
                  
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


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
				    <p class="text-secondary" id="status"></p>
				    No. Akreditasi   : <p class="text-secondary" id="no_akreditasi"></p>
				    Tahun Akreditasi : <p class="text-secondary" id="tahun_akreditasi"></p>
				    Alamat : <p class="text-secondary" id="alamat"></p>
				    No. Telepon : <p class="text-secondary" id="telepon"></p>
				    Email : <p class="text-secondary" id="email"></p>
				    <strong class="text-danger">Tanggal Berakhir MOU</strong> : <p class="text-secondary" id="mou"></p>
				  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        </div>
		    </div>
		  </div>
		</div>
	<!-- </div> -->
		<!-- End modal details -->
<script>
  $(document).ready(function(){
		$('#add_button').hide();

		if ($('#id_role').val() == 4) 
		{
			$('#add_button').show();	
		}		

    $(document).on('click', '#add_button', function(){
    			var	institusi_id = $('#id_institusi').val();

    			$.ajax({
  					url: '<?php echo base_url(); ?>user/fetchSingleInstitusi',
  					method: 'POST',
  					data:{institusi_id:institusi_id},
  					dataType:'json',
  					success:function(data)
  					{
						$('#detailsModal').modal('show');
						$('.modal-title').text(data.nama_institusi);
						$('#no_akreditasi').text(data.akreditasi);
						$('#tahun_akreditasi').text(data.tahun_akreditasi);
						$('#status').text(data.status);
						$('#alamat').text(data.alamat);
						$('#telepon').text(data.telepon);
						$('#email').text(data.email);
						$('#mou').text(data.mou);
  					}
    			});
	    	});
    
    $('#info').click(function(){			
      var id = $('#id_institusi').val();
      
      
      $.ajax({
        url : "<?php echo base_url();?>user/fetchSingleInstitusi",
        method : "POST",
        data : {id: id},
        async : false,
        dataType : 'json',
        success: function(data){
          $('#akreditasi').val('berhasil');
        }
      });
    });
    
    
  });
</script>


