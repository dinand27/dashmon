<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>

<div class="container-fluid">

    <h1>Testing page</h1>

<table class="table table-bordered">
    <tr>
        <td>UNIT</td>
        <td>KET</td>
        <td>Tgl</td>
        <td>Qty</td>
    </tr>
    <tr>
        <?php if($cart): ?>
            <?php foreach ($item as $item): ?>
        <td><?php echo $item['id_unit'] ?> </td>
        <td><?php echo $item['tgl'] ?> </td>
        <td><?php echo $item['qty'] ?> </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>
<a href="<?php site_url('testing') ?>">Continue s</a> 
</div>
<?php echo $this->endSection(); ?>
