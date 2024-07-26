<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<div class="container-fluid">
    <h1>Testing page</h1>
    <form action="testing-hasil" method="get">
        <input type="text" name="cari" id="cari"> 
        <input type="submit" value="Cari ID">
    </form>
<?php foreach($row as $d): ?>
    <?php echo $d->id_unit.' - '.$d->keterangan; ?>
    <?php endforeach; ?>
</div>
<?php echo $this->endSection(); ?>
