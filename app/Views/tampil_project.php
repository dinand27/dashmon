<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>

<div class="container-fluid">
    <h3>Filter Data  </h3>
    <form action="<?php echo base_url('tampil_project_detail')?>" method="get">

        <div class="form-group">
            <label for="id">Cari Project : </label>
            <div class="form-group">
            <select name="id" class="form-control form-group">
                <option value="">Pilih</option>
				<option value="1">Operation</option>
                <option value="2">Breakdown</option>
            
            </select>
        </div>
        <input type="submit" value="Search" class="btn btn-primary">
        <!-- <a class="btn btn-danger" href="<?php echo base_url('administrator/Kepala_keluarga/cetak') ?>"><i class="fa fa-print">Print</i></a>     -->
      </form>

    <div>
        <table class="table table-stripes table-hover table-bordered table-responsive">
        <div class="mb-4">
        <thead class="thead-light">
		<tr>
			<th class="text-center">No</th>
			 <th class="text-center">Nama Project</th>
		</tr>
        </thead>

        <?php 
        $n=1;
        foreach($project as $p): ?>
            <tr>
                <td><?php echo $n++ ?></td>
                <td><?php echo $p->nm_project; ?></td>
            </tr>
            <?php endforeach; ?>
           </table>

    </div>
</div>


<?php echo $this->endSection(); ?>
 