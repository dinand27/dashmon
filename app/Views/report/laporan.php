<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>

	<div class="container mt-3">
		<?php
		if(session()->getFlashdata('message')){
		?>
			<div class="alert alert-info">
				<?= session()->getFlashdata('message') ?>
			</div>
		<?php
		}
		?>
		<form method="post" action="report/simpanExcel" enctype="multipart/form-data">
			<div class="form-group">
				<label>File Excel</label>
				<input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Upload</button>
			</div>
		</form>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NO</th>
					<th>TANGGAL</th>
					<th>ID UNIT</th>
                    <th>KETERANGAN</th>
                    <th>STATUS</th>
				</tr>
			</thead>
			<tbody id="contactTable">
			<?php
			$no= 1;
			if(!empty($laporan)){
				foreach($laporan as $dt){
				?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $dt['tgl'] ?></td>
						<td><?= $dt['id_unit'] ?></td>
                        <td><?= $dt['keterangan'] ?></td>
                        <td><?= $dt['status'] ?></td>
					</tr>
				<?php
				}
			}else{
			?>
				<tr>
					<td colspan="3">Tidak ada data</td>		
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
	</div>

    


    <?php echo $this->endSection(); ?>
