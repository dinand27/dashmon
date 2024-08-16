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
				<label ><button class="btn btn-warning" onclick="fnImport()" id="btnImport" style="display: block;">Import Exel</button></label>
				<div id="importdiv" style="display:none;">
				<input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
				<button class="btn btn-primary" type="submit">Upload</button>
				</div>
				
			</div>
			<div class="form-group">
				
				<!-- <a href="<?php echo base_url('init_report'); ?>" class="btn btn-danger" onclick="fungsiInit()">Delete-Report</a>  -->

			</div>
		</form>
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="text-center">
					<th>NO</th>
					<th>ID UNIT</th>
					<th>KETERANGAN</th>
					<th>STATUS</th>


				</tr>
			</thead>
			<tbody id="contactTable">
			<?php
			$no= 1;
			if(!empty($rekapan)){
				foreach($rekapan as $rekap){
				?>
					<tr>
						<td class="text-center"><?= $no++ ?></td>
						<td class="text-center"><?= $rekap['idunit'] ?></td>
						<td><?= $rekap['keterangan'] ?></td>
						<td class="text-center"><?= $rekap['status'] ?></td>

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
				var del= confirm("Import Data akan Menimpa Data Lama?");
				if (del==true){		
					window.location.href="<?php echo base_url('init_report'); ?>" 
				}else { alert("batal Import")}
					return del;
					}

			


			
          
</script>
 

    <?php echo $this->endSection(); ?>
