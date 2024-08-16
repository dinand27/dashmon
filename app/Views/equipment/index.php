<?php echo $this->extend('/layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('/layout/navbar') ?>
<?php $sess= session()->get('role'); 
$msg= session()->getFlashdata('msg');
echo 'sessi', $msg;
?>
<div class="container-fluid">
<h1> <?php echo $title; ?></h1>

<a href="<?php echo base_url('create_data'); ?>" class="btn btn-primary"> Add</a> 
    <a href="<?php echo base_url('init_data'); ?>" class="btn btn-danger" onclick="fungsiInit()">Init</a> 


<table class="table table-hover ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th  scope="col">Unit</td>
        <th  scope="col">Jam</td>
        <th  scope="col">State</td>
        <th  scope="col">Edit|Del</td>
    </tr>
    </thead>
    <?php   $n=1 ; foreach($dataUnit as $d): ?>
    <tbody>
    <tr>
        <td><?php echo $n++; ?> </td>
        <td><?php echo $d->nolambung ?> </td>
        <td><?php echo $d->waktu ?> </td>
        <td><?php echo $d->status ?> </td>
        <td> 
        <?php echo anchor('equipment/edit/'.$d->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>E</div>') ?>
        <?php echo anchor('equipment/delete/'.$d->id,'<div class="btn btn-sm btn-danger" onclick="return fungsiHapus()"><i class="fa fa-trash"></i>D</div>') ?>
         </td> 
    </tr>
    </tbody>
    <?php endforeach; ?>
</table>
<?php echo anchor('logout','<div class="btn btn-sm btn-warning" onclick="return logout()">Logout</div>') ?>
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
 