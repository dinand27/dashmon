<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>
	<div class="container mt-3 text-center">

	<div class="d-flex justify-content-start">
	<form action="<?php echo base_url('report/detail') ?>" method="get"> 
	<select name="filter" id="filter" class="btn btn-secondary" onchange="this.form.submit()">
		<option selected value="0">Filter</option>
		<?php foreach ($listproject as $row): ?>
		<option value="<?php echo $row['id']?>"> <?php echo $row['id'].' . '.$row['nm_project'] ?></option>
		<?php endforeach; ?>
	</select>
</form>

</div>

				<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>NO</th>
					<th>KETERANGAN</th>
					<th>JUMLAH</th>
					<th>HinoZS</th>
					<th>HinoZY</th>
					<th>HY</th>

				</tr>
			</thead>
			<tbody>
			<tr class="table-dark">

					<tr class="table-success">
						<td>1</td>
						<td>DT BEROPERASI</td>
						<td><?= count($opr)  ?></td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
					<tr class="table-warning">
						<td>2</td>
						<td>BREAKDOWN</td>
						<td><?= count($breakdown)  ?></td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
					<tr class="table-danger">
						<td>3</td>
						<td>ACCIDENT</td>
						<td><?= count($acd)  ?></td>
						<td>-</td>
						<td>-</td>
						<td>-</td>

					</tr>
					<tr class="table-primary">
						<td>4</td>
						<td>STANDBY</td>
						<td><?= count($stb)  ?></td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>

			</tbody>
		</table>
	</div>

<!-- <div>
<?php foreach($data_dt as $dt): ?>
	<ul>
		<li><?php echo $dt['id_unit']?></li>	
		<li><?php echo $dt['merk']?></li>
		<li><?php echo $dt['status']?></li>
	</ul>
	<?php 
		$db = \Config\Database::connect();
		$stat= $dt['status'];
		$query= $db->query("SELECT * FROM report WHERE status = 'OPR' ");	
		$data= $query->getResult(); 
		// dd($data);
		?>
<?php endforeach; ?>	 -->



    <?php echo $this->endSection(); ?>
