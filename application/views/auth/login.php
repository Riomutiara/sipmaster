<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?= base_url();?>assets/img/LOGOsilolamanik.png" class="mb-4" style="width: 200px; height: auto"></img>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Username" value="<?= set_value('username'); ?>">
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <br>                    
                    <button type="submit" class="btn btn-success btn-user btn-block">
                                Login
                            </button>
                    <hr>                    
                  </form>                                    
                  <div class="text-center">
                    <small class="form-text text-muted">
                      &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script>. Tim IT RSJ. HB. Saanin Padang | Bagian Diklat.
                      <br>
                      <br>
                      <a href="https://drive.google.com/file/d/1pVaKmFub42NuY-j0-wVC0eHCpz_NcMri/view?usp=sharing" target="blank">User Manual Instansi</a> |  
                      <a href="https://drive.google.com/file/d/1rNHcoAkL-3nUnV3cmMVNGAkXhaiu_2bb/view?usp=sharing" target="blank">User Manual Pembimbing</a> |
                      <!-- <a href="https://drive.google.com/file/d/1rKjhlImb6otTiWfSVlPnRG3U4hUaXqMT/view?usp=sharing" target="blank">User Manual Instansi</a> |  
                      <a href="https://drive.google.com/file/d/1TElL2l3RfwFJ_sVm1BZFQXsBu9-BgrYp/view?usp=sharing" target="blank">User Manual Pembimbing</a> | -->
                      <!-- <a href="https://drive.google.com/file/d/1-RSy9L1kmTnwxBAr0qSKhTDHWKPUKrrj/view?usp=sharing" target="blank">Video</a> -->
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



<!-- <div class="container"> -->

    <!-- Outer Row -->
    <!-- <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0"> -->
            <!-- Nested Row within Card Body -->
            <!-- <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <input type="" name="" class="form-control">
                <img src="<?= base_url();?>assets/img/rsj.png"></img>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center mb-4">
                  <img src="<?= base_url();?>assets/img/LOGOsilolamanik.png" style="width: 200px; height: auto"></img> -->
              
                    <!-- <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1> -->
                  <!-- </div>
                  <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="post" action="<?= base_url('auth'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Alamat Email" value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata Sandi">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>


                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <hr>
                    
                  </form>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Lupa Kata Sandi?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registration'); ?>">Buat Akun!</a>
                  </div>                  
                </div>
                <div class="copyright text-center my-auto">
                    <small><span>&copy; TIM IT RSJ PROF. HB. SAANIN PADANG - BAGIAN DIKLAT <?= date('Y'); ?>
                    </span></small>
                </div>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>        
    </div>
  </div> -->