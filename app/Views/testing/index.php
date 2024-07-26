<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<div class="container-fluid">
    <h1>Testing page</h1>
    <form action="testing-hasil" method="get">
        <input type="text" name="cari" id="cari"> 
        <input type="submit" value="KLIK">
    </form>

</div>
<?php echo $this->endSection(); ?>
