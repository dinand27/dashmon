<?php echo $this->extend('layout/header'); ?>

<?php echo $this->section('content'); ?>

<body>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Form <span class="font-weight-bold text-primary"><?php echo $title ?> </span></h5></div>
            <div class="card-body">
              <form action="<?php echo base_url() ?>./register" method="post">
                <div class="form-group mt-3">
                  <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group mt-3">
                  <input type="text" name="namalengkap" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-group mt-3">
                <div class="form-group ">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group mt-3">
                <div class="form-group ">
                  <input type="submit" name="" value="Register" class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

<?php echo $this->endSection(); ?>