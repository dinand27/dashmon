<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>
	<div class="container mt-3 text-center">

	<div class="d-flex justify-content-start">
	<form action="<?php echo base_url('report/detail') ?>" method="get"> 
	<select name="filter" id="filter" class="btn btn-secondary" onchange="this.form.submit()">
		<option selected value="0">Filter Project</option>
		<?php foreach ($listproject as $row): ?>
		<option value="<?php echo $row['id']?>"> <?php echo $row['id'].'.'.$row['nm_project'] ?></option>
		<?php endforeach; ?>
	</select>
</form>
<div class="d-flex justify-content-end">
<button class="btn btn-primary">Lokasi Kerja: </button>

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

					<tr class="table-success">
						<td>1</td>
						<td>DT BEROPERASI</td>
						<td><?= count($opr)  ?></td>
					</tr>
					<tr class="table-warning">
						<td>2</td>
						<td>BREAKDOWN</td>
						<td><?= count($breakdown)  ?></td>
					</tr>
					<tr class="table-danger">
						<td>3</td>
						<td>ACCIDENT</td>
						<td><?= count($acd)  ?></td>

					</tr>
					<tr class="table-secondary">
						<td>4</td>
						<td>STANDBY</td>
						<td><?= count($stb)  ?></td>

					</tr>
			</tbody>
		</table>
	</div>


    <?php echo $this->endSection(); ?>
