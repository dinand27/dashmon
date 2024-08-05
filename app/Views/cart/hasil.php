<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<div class="container-fluid">
    <h1>Testing page</h1>
    <form action="testing" method="get">
        <input type="text" name="cari" id="cari"> 
        <input type="submit" value="Cari ID">
    </form>

    <table class="table table-bordered">
    <tr>
        <td>UNIT</td>
        <td>KET</td>
        <td>Add</td>
    </tr>
<?php foreach($data as $d): ?>
    <tr>
        <td> <?php echo $d->id_unit?> </td>
        <td> <?php echo $d->keterangan ?></td>
        <td><a href="<?php echo base_url('testing/edit/').$d->id ?>"></a> Edit  </td> 
    </tr>
   
    <?php endforeach; ?>
    </table>


</div>
<?php echo $this->endSection(); ?>
