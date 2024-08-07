<div class="container-fluid">
  <!--batas ROWs  -->
<div class="row">
    <!-- end rows -->
    <div class="col-md-3 mt-5">
      <!-- batas awal cards -->
  <div class="card" >
    <div class="card-body">
       <h5 class="card-title">Kontrak KBM  <span class="text-muted small pt-2 ps-1">|   </span></h5>
      <!-- table -->

      <table class="table table-borderless table-sm">
        <tbody>
          <?php foreach($kkbm as $d): ?>
          <tr>
            <td><?php echo $d['nolambung']; ?></td>
            <td><?php echo $d['waktu']; ?></td>
            <?php
            $colour= 'none';
            if($d['status'] == "Accident"){
              $colour= 'red';
            }else if($d['status'] == "Breakdown"){
              $colour= 'Orange';
            }else if($d['status'] == "Operation"){
              $colour= 'green';
            }
             ?>
            <td  style="color:<?=$colour?>;"><?php echo $d['status']; ?></td>
            <td>
            <?php echo anchor('chart/edit/'.$d['id'],'<div class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></div>') ?>
            
            </td>
          </tr>
          <?php endforeach; ?>
         
        </tbody>
      </table>  

    </div>
  </div>
<!-- batas end cards -->
    </div> 
<!-- batas ROW -->

<div class="col-md-3 mt-5">
    <!-- batas awal cards -->
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Kontrak BDM</h5>
    <!-- table -->
    <table class="table table-borderless table-sm">
    <tbody>
          <?php foreach($kbdm as $d): ?>
          <tr>
            <td><?php echo $d['nolambung']; ?></td>
            <td><?php echo $d['waktu']; ?></td>
            <?php
            $colour= 'none';
            if($d['status'] == "Accident"){
              $colour= 'red';
            }else if($d['status'] == "Breakdown"){
              $colour= 'Orange';
            }else if($d['status'] == "Operation"){
              $colour= 'green';
            }
             ?>
            <td  style="color:<?=$colour?>;"><?php echo $d['status']; ?></td>

            <td>
            <?php echo anchor('chart/edit/'.$d['id'],'<div class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></div>') ?>
            
            </td>
          </tr>
          <?php endforeach; ?>
         
        </tbody>
    </table>  

  </div>
</div>
<!-- batas end cards -->
  </div> 
<!-- batas ROW -->

<div class="col-md-3 mt-5">
    <!-- batas awal cards -->
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Rental BDM</h5>
    <!-- table -->
    <table class="table table-borderless table-sm">
    <tbody>
          <?php foreach($rbdm as $d): ?>
          <tr>
            <td><?php echo $d['nolambung']; ?></td>
            <td><?php echo $d['waktu']; ?></td>
            <?php
            $colour= 'none';
            if($d['status'] == "Accident"){
              $colour= 'red';
            }else if($d['status'] == "Breakdown"){
              $colour= 'Orange';
            }else if($d['status'] == "Operation"){
              $colour= 'green';
            }
             ?>
            <td  style="color:<?=$colour?>;"><?php echo $d['status']; ?></td>

            <td>
            <?php echo anchor('chart/edit/'.$d['id'],'<div class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></div>') ?>
            
            </td>
          </tr>
          <?php endforeach; ?>
         
        </tbody>
    </table>  

  </div>
</div>
<!-- batas end cards -->
  </div> 
<!-- batas ROW -->

<div class="col-md-3 mt-5">
    <!-- batas awal cards -->
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Rental KBM</h5>
    <!-- table -->
    <table class="table table-borderless table-sm">
      <tbody>
      <tbody>
          <?php foreach($rkbm as $d): ?>
          <tr>
            <td><?php echo $d['nolambung']; ?></td>
            <td><?php echo $d['waktu']; ?></td>

            <?php
            $colour= 'none';
            if($d['status'] == "Accident"){
              $colour= 'red';
            }else if($d['status'] == "Breakdown"){
              $colour= 'Orange';
            }else if($d['status'] == "Operation"){
              $colour= 'green';
            }
             ?>
            <td  style="color:<?=$colour?>; cursor:pointer;"><?php echo $d['status']; ?></td>
            <td>
            <?php echo anchor('chart/edit/'.$d['id'],'<div class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></div>') ?>
                        </td>
          </tr>
          <?php endforeach; ?>
         
        </tbody>
    </table>  

  </div>
</div>
<!-- batas end cards -->
  </div> 
<!-- batas ROW -->

</div>

</div>