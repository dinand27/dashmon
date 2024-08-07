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
				<!-- <a href="<?php echo base_url('init_report'); ?>" class="btn btn-danger" onclick="fungsiInit()">Delete-Report</a>  -->

			</div>
		</form>
		<table class="table table-bordered">
			<thead>
				<tr class="text-center">
					<th>NO</th>
					<th>ID UNIT</th>
					<th>LOKASI</th>
					<th>DRIVER</th>
					<th>STATUS</th>
                    <th>KETERANGAN</th>
					<th>PRESENSI</th>
					<th>CekOut</th>
					<th>CekIn</th>

				</tr>
			</thead>
			<tbody id="contactTable">
			<?php
			$no= 1;
			if(!empty($laporan)){
				foreach($laporan as $dt){
				?>
					<tr>
						<td class="text-center"><?= $no++ ?></td>
						<td class="text-center"><?= $dt['id_unit'] ?></td>
						<td class="text-center">KBM</td>
						<td class="text-center">dICKI</td>
						<td><?= $dt['status'] ?></td>
                        <td><?= $dt['keterangan'] ?></td>
						<td class="text-center">Ijin</td>
						<td class="text-center">08.00</td>
						<td class="text-center">10.00</td>

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

    

	<script>
					function fungsiHapus(){

					var del=confirm("Anda Yakin Hapus Data Laporan?");
					if (del==true){
					alert ("Data Terhapus")
					}else{
						alert("Batal hapus")
					}
					return del;
					}

          
          function fungsiInit(){

					var del=confirm("SURE FOR RESET Data?");
					if (del==true){
					alert ("Data di Reset")
					}else{
						alert("Batal Reset")
					}
					return del;
					}

          function logout() {
          var confirms=confirm("Anda Yakin Logout?");
					if (confirms==true){
					alert ("Terima kasih")
					}else{
						alert("Batal Logout")
					}
					return confirms;
					}
          
</script>
 

    <?php echo $this->endSection(); ?>
