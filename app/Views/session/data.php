<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?php $session= session(); ?>

<div class="container-fluid">
<div class="card"  style="width: 18rem;">
<table class="table table-bordered">
    <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Unit</td>
        <td>Ret</td>
    </tr>
    <tr>
    <td><?php echo $session->get('id'); ?></td>
        <td><?php echo $session->get('nama'); ?></td>
        <td><?php echo $session->get('unit'); ?></td>
        <td><?php echo $session->get('retase'); ?></td>
    </tr>
</table>
</div>

</div>

<?php echo $this->endSection(); ?>