<?php

use Predis\Command\Redis\ECHO_;

 echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>
	<div class="container mt-3 text-center">
		
	<form action="<?php echo base_url('report/detail') ?>" method="get"> 
	<select name="filter" id="filter" class="form-select" onchange="this.form.submit()">
		<option selected>Filter Project</option>
		<option value="1">INTERMEDIET</option>
		<option value="2">RENTAL BARGING</option>
		<option value="3">KONTRAK KBM</option>
		<option value="4">KONTRAK BDM</option>
		<option value="5">RENTAL KBM</option>
		<option value="6">RENTAL BDM</option>
		<option value="7">FEEDING</option>
		<option value="8">PEMBATUAN MKG</option>
	</select>
</form>
<div>
	<SPAN>Jumlah Data di </SPAN>
<?php 
$url =  $_SERVER["REQUEST_URI"];

switch ($url) {
  case "/report/detail?filter=1":
    echo "INTERMEDIET";
    break;
  case "/report/detail?filter=2":
    echo "RENTAL BARGING";
    break;
  case "/report/detail?filter=3":
    echo "KONTRAK KBM";
    break;
  case "/report/detail?filter=4":
    echo "KONTRAK BDM";
    break;
  case "/report/detail?filter=5":
    echo "RENTAL KBM";
    break;
  case "/report/detail?filter=6":
    echo "RENTAL BDM";
    break;
	  case "/report/detail?filter=7":
    echo "FEEDING";
    break;
  default:
    echo "PEMBATUAN KBM";
}

echo '='.count($data);
?>
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
