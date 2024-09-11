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
		<form method="post" action="report_rfid/simpanExcelRfid" enctype="multipart/form-data">
			<div class="form-group">
				<label ><button class="btn btn-warning mb-2" onclick="fnImport()" id="btnImport" style="display: block;">Import Exel</button></label>
				<div id="importdiv" style="display:none;">
				<input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
				<button class="btn btn-primary" type="submit">Upload RFID</button>
				</div>
				
			</div>
			<div class="form-group">
				
				<!-- <a href="<?php echo base_url('init_report_rfid'); ?>" class="btn btn-danger" onclick="fungsiInit()">Delete-Report</a>  -->

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
					<th>PRESENSI</th>
					<th>SPK</th>
					<th>CekOut</th>
					<th>CekIn</th>
					<th>BD</th>
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
						<td class="text-center"><?= $dt['unit'] ?></td>
						<td class="text-center"><?= $dt['project'] ?></td>
						<td class="text-center"><?= $dt['driver'] ?></td>
						<td class="text-center"><?= $dt['dt_status'] ?></td>
						<td class="text-center"><?= $dt['driver_status'] ?></td>
						<td class="text-center"><?= $dt['spk'] ?></td>
						<td class="text-center"><?= $dt['jam_keluar'] ?></td>
						<td class="text-center"><?= $dt['jam_masuk'] ?></td>
						<td class="text-center"><?= $dt['jam_bd'] ?></td>
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

			function fnImport(){
				var div = document.getElementById('importdiv');
				var btn = document.getElementById('btnImport');
				// var confirms= confirm("Import Data Baru");
				var del= confirm("Import Data akan Menimpa Data RFID Lama?");
				if (del==true){		
					window.location.href="<?php echo base_url('init_report_rfid'); ?>" 
				}else { alert("batal Import")}
					return del;
					}

			


			
          
</script>
 

    <?php echo $this->endSection(); ?>
