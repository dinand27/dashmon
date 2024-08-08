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
<?php foreach($databes as $db){
	$kata= $db['id_unit'];
	$hinozs= [
			'DT-260','DT-261','DT-262','DT-263','DT-264','DT-265','DT-266','DT-267','DT-268','DT-269','DT-270','DT-271','DT-272','DT-273','DT-274','DT-275',
			'DT-276','DT-277','DT-278','DT-279','DT-280','DT-281','DT-282','DT-283','DT-284','DT-285','DT-286','DT-287','DT-288','DT-289','DT-290','DT-291',
			'DT-292','DT-293','DT-294','DT-295','DT-296','DT-297','DT-298','DT-299','DT-300','DT-301','DT-302','DT-303','DT-304','DT-305','DT-306','DT-307',
			'DT-308','DT-309',
	];

	$hino_zy= [
		'DT-310','DT-311','DT-312','DT-313','DT-314','DT-315','DT-316','DT-317','DT-318','DT-319','DT-320','DT-321','DT-322','DT-323','DT-324','DT-325',
		'DT-326','DT-327','DT-328','DT-329','DT-330','DT-331','DT-332','DT-333','DT-334','DT-335','DT-336','DT-337','DT-338','DT-339','DT-340','DT-341',
		'DT-342','DT-343','DT-344','DT-345','DT-346','DT-347','DT-348','DT-349','DT-350','DT-351','DT-352','DT-353','DT-354','DT-355','DT-356','DT-357',
		'DT-358','DT-359','DT-360','DT-361','DT-362','DT-363','DT-364','DT-369','DT-057','DT-365','DT-366','DT-367','DT-368','DT-370','DT-371','DT-372',
		'DT-373','DT-374','DT-375','DT-376','DT-377','DT-378','DT-379','DT-380','DT-381','DT-382','DT-383','DT-384','DT-385','DT-386','DT-387','DT-388',
		'DT-389','DT-390','DT-391','DT-392','DT-393','DT-394',
		];

	$string_zs= implode(',',$hinozs);
	$string_zy= implode(',',$hino_zy);
	// echo 'Nomor : ', $string_zy;
	// echo 'Hino Zs', $string;

} 


?>
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


    <?php echo $this->endSection(); ?>
