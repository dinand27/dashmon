<?php echo $this->extend('/layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('/layout/navbar') ?>

<div class="container fluid">
    <h1><?php echo $title ?></h1>

    <form action="<?php base_url('proses_data') ?> " method="POST">
            <div class="mb-3">
                <label for="nolambung" class="form-label">Nomor Lambung</label>
                <input type="text" class="form-control" id="nolambung" name="nolambung">
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="text" class="form-control" id="waktu" name="waktu">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" id="status" >
                    <option value="" > --Pilih Status--</option>
                    <option value="Accident">Accident</option>
                    <option value="Breakdown">Breakdown</option>
                    <option value="Standby">Standby</option>
                    <option value="Operation">Operation</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_project" class="form-label">Project</label>
                <select name="id_project" class="form-control" id="id_project" >
                    <option value="" > --Pilih Project--</option>
                    <option value="1">Kontrak KBM</option>
                    <option value="2">Kontrak BDM</option>
                    <option value="3">Rental BDM</option>
                    <option value="4">Rental KBM</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      <!-- form bawah -->

</div>

<?php echo $this->endSection(); ?>