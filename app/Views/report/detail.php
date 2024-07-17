<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>

<h1>
    Project Main Report
</h1>
<div>
<div class="card" style="width: 45rem;">
  <div class="card-body">
  <?php foreach($namaproject2 as $row): ?>
  <form action="<?php base_url('project/'.$row->id)  ?>" method="post">
  <?php endforeach; ?>
    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" onsubmit="fungSubmit()">
      Filter Project
    </button>

  <ul class="dropdown-menu">
    <?php foreach($namaproject2 as $row): ?>
    <li><a class="dropdown-item" href="<?php echo base_url('project/'.$row->id)  ?>"><?php echo $row->nm_project ?> </a></li>
    <?php endforeach; ?>
  </ul>
</div>
  </form>  

  
</div>
<table class="table table-striped">
    <tr>
        <td>ID UNIT</td>
        <td>KETERANGAN</td>
        <td>STATUS</td>
    </tr>
    <tr>
      <?php
      $n= 1;
      foreach ($namaproject as $id):
       ?>
      <td><?php echo $id->id_unit; ?></td>
      <td><?php echo $id->keterangan; ?></td>
      <td><?php echo $id->status; ?></td>
    </tr>
    <?php endforeach ?>
</table>
</div>

</div>
</div>







<?php echo $this->endSection(); ?>
