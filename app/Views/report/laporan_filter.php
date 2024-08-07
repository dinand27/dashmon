<?php

use Predis\Command\Redis\ECHO_;

 echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>
	<div class="container mt-3 text-center">

	<div>

</h4>
</div>    
<div class="d-flex justify-content-start">
	<form action="<?php echo base_url('report/detail') ?>" method="get"> 
	<select name="filter" id="filter" class="btn btn-secondary" onchange="this.form.submit()">
		<option selected value="0">Filter</option>
		<?php foreach ($listproject as $row): ?>
			<option value="<?php echo $row->id ?>"> <?php echo $row->id.'.'.$row->nm_project ?></option>
		<?php endforeach; ?>
	</select>
</form>

<div class="d-flex justify-content-end">
<button class="btn btn-primary">
Kategori -> <strong>
<?php 
$url =  $_SERVER["REQUEST_URI"];
foreach ($listproject as $i):

switch ($url) {
  case "/report/detail?filter=".$i->id:
    echo $i->nm_project;
    break;
}
endforeach;

?></strong>
</button>
</div>
</div>

<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>NO</th>
					<th>KETERANGAN</th>
					<th>JUMLAH</th>
				</tr>
			</thead>	
			<tbody>
			<tr class="table-dark">
						<td></td>
						<td >ALOKASI UNIT</td>
						<td><?= count($data)  ?></td>
					</tr>
					<tr class="table-success">
						<td>-</td>
						<td>DT BEROPERASI</td>
						<td><?= count($opr)  ?></td>
					</tr>
					<tr class="table-warning">
						<td>-</td>
						<td>BREAKDOWN</td>
						<td><?= count($breakdown)  ?></td>
					</tr>
					<tr class="table-danger">
						<td>-</td>
						<td>ACCIDENT</td>
						<td><?= count($acd)  ?></td>

					</tr>
					<tr class="table-primary">
						<td>-</td>
						<td>STANDBY</td>
						<td><?= count($stb)  ?></td>

					</tr>
			</tbody>
		</table>
	</div>




    <?php echo $this->endSection(); ?>
