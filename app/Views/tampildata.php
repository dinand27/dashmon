<?php echo $this->extend('/layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('/layout/navbar') ?>

<div class="container-fluid">
<h1> <?php echo $title; ?></h1>
 <div>Kontrak KBM</div>
<table class="table table-hover table-sm ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th  scope="col">Unit</td>
        <th  scope="col">Jam</td>
        <th  scope="col">State</td>
    </tr>
    </thead>
    <?php   $n=1 ; foreach($kkbm as $d): ?>
    <tbody>
    <tr>
        <td><?php echo $n++; ?> </td>
        <td><?php echo $d['nolambung'] ?> </td>
        <td><?php echo $d['waktu'] ?> </td>
        <td><?php echo $d['status'] ?> </td>
    </tr>
    </tbody>
    <?php endforeach; ?>
</table>
<div>Kontrak BDM</div>
<table class="table table-hover table-sm ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th  scope="col">Unit</td>
        <th  scope="col">Jam</td>
        <th  scope="col">State</td>
    </tr>
    </thead>
    <?php   $n=1 ; foreach($kbdm as $d): ?>
    <tbody>
    <tr>
        <td><?php echo $n++; ?> </td>
        <td><?php echo $d['nolambung'] ?> </td>
        <td><?php echo $d['waktu'] ?> </td>
        <td><?php echo $d['status'] ?> </td>
    </tr>
    </tbody>
    <?php endforeach; ?>
</table>
<div>Rental BDM</div>

<table class="table table-hover table-sm ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th  scope="col">Unit</td>
        <th  scope="col">Jam</td>
        <th  scope="col">State</td>
    </tr>
    </thead>
    <?php   $n=1 ; foreach($rbdm as $d): ?>
    <tbody>
    <tr>
        <td><?php echo $n++; ?> </td>
        <td><?php echo $d['nolambung'] ?> </td>
        <td><?php echo $d['waktu'] ?> </td>
        <td><?php echo $d['status'] ?> </td>
    </tr>
    </tbody>
    <?php endforeach; ?>
</table>
<div>Rental KBM</div>
<table class="table table-hover table-sm ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th  scope="col">Unit</td>
        <th  scope="col">Jam</td>
        <th  scope="col">State</td>
    </tr>
    </thead>
    <?php   $n=1 ; foreach($rkbm as $d): ?>
    <tbody>
    <tr>
        <td><?php echo $n++; ?> </td>
        <td><?php echo $d['nolambung'] ?> </td>
        <td><?php echo $d['waktu'] ?> </td>
        <td><?php echo $d['status'] ?> </td>
    </tr>
    </tbody>
    <?php endforeach; ?>
</table>

</div>



      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div> -->
    </div>
  </div>
</div>


<script>
					function fungsiHapus(){

					var del=confirm("Anda Yakin Hapus?");
					if (del==true){
					alert ("Data Terhapus")
					}else{
						alert("Batal hapus")
					}
					return del;
					}
				</script>
<?php echo $this->endSection(); ?>
 