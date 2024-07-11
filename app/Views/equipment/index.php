<?php echo $this->extend('/layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('/layout/navbar') ?>

<div class="container-fluid">
<h1> <?php echo $title; ?></h1>
   <!-- Button trigger modal -->
   <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> -->
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
</div>


<!-- Modal form input -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Equipment</h1>
      </div>
      <div class="modal-body">
        <!--  form batas atas -->
        <form action="<?php base_url('equipment/simpan') ?> " method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Lambung</label>
                <input type="text" class="form-control" id="nolambung">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Waktu</label>
                <input type="text" class="form-control" id="waktu">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      <!-- form bawah -->
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

          				function fungsiInit(){

					var del=confirm("SURE FOR RESET Data?");
					if (del==true){
					alert ("Data di Reset")
					}else{
						alert("Batal Reset")
					}
					return del;
					}



</script>
        
<?php echo $this->endSection(); ?>
 