  <div class="container my-5">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <h4 class="card-header">Ubah Profile</h4>
          <form method="post" id="form_ubah_profile"></form>
          <div class="card-body">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama_akun" class="col-sm-2 col-form-label">Nama Akun</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_akun" name="nama_akun" value="<?= $user['nama_akun']; ?>" readonly>
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <!-- <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div> -->
            <!-- <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div> -->
            <!-- <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nomor telepon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $user['notlp']; ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div> -->
            <div class="form-group row">
              <div class="col-sm-2">Foto</div>
                <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                  </div>
                  <div class="class col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">Pilih file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </div>
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->
      </div>
    </div>
  </div>  
  <!-- end container -->
  <script type="text/javascript">
    $(document).ready(function(event){
      
      $(document).on('submit', '#form_ubah_profile', function(event){
      event.preventDefault();

        $.ajax({
        url: '<?php echo base_url(); ?>user/edit',
        method:'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success:function(data)
          {
            alert(data);
            // $('#form_institusi')[0].reset();
            // $('#institusiModal').modal('hide');
            // dataTable.ajax.reload();
          }
        });
      });

    });
  </script>
</div>     
            
         

