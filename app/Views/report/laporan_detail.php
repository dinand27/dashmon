<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>
	<div class="container mt-3 text-center">

	<div class="d-flex justify-content-start mb-3">
	<form action="<?php echo base_url('report/detail') ?>" method="get"> 
	<select name="filter" id="filter" class="btn btn-secondary" onchange="this.form.submit()">
		<option selected value="0">Filter Project</option>
		<?php foreach ($listproject as $row): ?>
		<option value="<?php echo $row['id']?>"> <?php echo $row['id'].'.'.$row['nm_project'] ?></option>
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
				</tr>
			</thead>
			<tbody id="contactTable">
					<tr>
						<td>1</td>
						<td>DT BEROPERASI</td>
						<td><?= count($opr)  ?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>BREAKDOWN HMSI</td>
						<td><?= count($hmsi)  ?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>BREAKDOWN SA</td>
						<td><?= count($sa)  ?></td>

					</tr>
					<tr>
						<td>4</td>
						<td>ACCIDENT</td>
						<td><?= count($acd)  ?></td>

					</tr>
					<tr>
						<td>5</td>
						<td>TLO</td>
						<td><?= count($tlo)  ?></td>

					</tr>
					<tr>
						<td>6</td>
						<td>COMMISIONING</td>
						<td><?= count($com)  ?></td>

					</tr>
					<tr>
						<td>7</td>
						<td>STANDBY</td>
						<td><?= count($stb)  ?></td>

					</tr>
					<tr>
						<td>8</td>
						<td>BREAKDOWN HONGYAN</td>
						<td><?= count($hong)  ?></td>

					</tr>
			
			</tbody>
		</table>
	</div>

    


    <?php echo $this->endSection(); ?>
