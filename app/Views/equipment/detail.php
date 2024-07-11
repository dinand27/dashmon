<?php echo $this->extend('/layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('/layout/navbar') ?>

<div class="container fluid">
<h1><?php echo $title ?> : <?php echo $detail->id ?></h1>

    <form method="post" action="<?php base_url('proses_edit_data') ?> " >
            <div class="mb-3">
                <label for="nolambung" class="form-label">Nomor Lambung</label>
                <input type="text" class="form-control" id="nolambung" name="nolambung" value="<?php echo $detail->nolambung ?>">
                <input type="hidden" class="form-control" id="id_unit" name="id_unit" value="<?php echo $detail->id ?>">
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="text" class="form-control" id="waktu" name="waktu" value="<?php echo $detail->waktu ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" id="status" >
                    <option value="<?php echo $detail->status?>" > <?php echo $detail->status?></option>
                    <option value="Accident">Accident</option>
                    <option value="Breakdown">Breakdown</option>
                    <option value="NonOperat">NonOperat</option>
                    <option value="Ready">Ready</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      <!-- form bawah -->

</div>

<?php echo $this->endSection(); ?>