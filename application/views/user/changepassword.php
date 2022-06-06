  <div class="container my-5">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <h4 class="card-header"><?= $title; ?></h4>
          <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/changepassword'); ?>" method="post">
              <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?php echo $user['id']; ?>">
                
                <label for="current_password">Password Sebelumnya</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="new_password1">Password Baru</label>
                <input type="password" class="form-control" id="new_password1" name="new_password1">
                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="new_password2">Ulang Password</label>
                <input type="password" class="form-control" id="new_password2" name="new_password2">
                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Ubah Password</button>
              </div>
            </form>
          </div>
          <!-- end card body -->
        </div>
      </div>
    </div>
  </div>
  <!-- end container -->
</div>
    