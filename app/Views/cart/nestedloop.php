<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<div class="container-fluid">
    <h1>Testing page</h1>
  
<div class="row">
    <!-- begin row -->
     
    <?php foreach($project as $p): ?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title text-center bg-warning"><?php echo $p->nm_project ?></h5>
    <table class="table table-bordered">
      
        <?php foreach($report as $r): ?>
            <?php if($r->idproject == $p->id){ ?>
        <tr class="text-center">
            <td><?php echo $r->id_unit ?> </td>
            <td><?php echo $r->status ?> </td>
        </tr>
        <?php }?>
        <?php endforeach; ?>
    </table>

  </div>
</div>
<?php endforeach; ?>
                
<!-- end dif row -->
</div>
<!-- end -->



  

</div>
<?php echo $this->endSection(); ?>
