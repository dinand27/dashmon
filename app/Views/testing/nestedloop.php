<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<div class="container-fluid">
    <h1>Testing page</h1>
  

    <table>
        <tr>
            <td>id Project</td>
            <td>id Unit</td>

        </tr>
        <?php foreach($project as $p): ?>
        <tr class="text-center">
            <td><?php echo $p->nm_project ?></td>
        </tr>
        <?php foreach($report as $r): ?>
            <?php if($r->idproject == $p->id){ ?>
        <tr>
            <td><?php echo $r->id ?> </td>
            <td><?php echo $r->id_unit ?> </td>
        </tr>
        <?php }?>
       <?php endforeach ?>
<?php endforeach ?>
    </table>

</div>
<?php echo $this->endSection(); ?>
