<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?php $session= session(); ?>
<div class="container-fluid">

    <h3>Form Session</h3>
    <form method="post" action="<?php echo base_url('session-add') ?>">
      
    
        <p>
            <label for="id">ID: </label>
            <input type="text" name="id" id="id"  />
        </p>
        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" id="nama"  />
        </p>
        <p>
            <label for="unit">Unit: </label>
            <input type="text" name="unit" id="unit">
        </p>
        <p>

            <input type="text" name="retase" id="retase" value="<?php echo $session->get('retase') ?>" hidden/>
        </p>
        <input type="submit" value="Daftar" name="daftar" />
</form>

</div>

<?php echo $this->endSection(); ?>