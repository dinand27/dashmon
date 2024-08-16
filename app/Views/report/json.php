<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>

<h1>Get File From URL Googlesheet</h1>

<div>
    <table>
        <tr>
            <td>No</td>
            <td>CheckPoint</td>
            <td>CheckPoint</td>
            <td>ReaderCode</td>
            <td>PatrolTime</td>
            <td>Day</td>
            <td>Month</td>
            <td>Year</td>
            <td>Date</td>
        </tr>
        <?php foreach($datalist as $row): ?>
        <tr>
            <td><?php echo $row->employee_age ?></td>
            <td><?php echo $row->employee_name ?></td>
            
        </tr>
        <?php endforeach;        ?>
    </table>
</div>



<?php echo $this->endSection(); ?>
