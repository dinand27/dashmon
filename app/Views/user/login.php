<?php echo $this->extend('layout/header'); ?>

<?php echo $this->section('content'); ?>

<body>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Please <span class="font-weight-bold text-primary">LOGIN</span></h5></div>
            <div class="card-body">
              <form action="<?php echo base_url() ?>./login" method="post"> 
                <div class="form-group mt-3">
                  <input type="text" name="email" class="form-control" placeholder="Username/Email">
                </div>
                <div class="form-group mt-3">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                  <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                <div class="form-group mt-3">
                  <input type="submit" name="" value="Login" class="btn btn-primary btn-block">
                  <a href="<?php echo base_url() ?>./register" >Register</a> 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

<?php echo $this->endSection(); ?>