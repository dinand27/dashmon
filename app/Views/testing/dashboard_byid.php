<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>


<!-- bagian wrap chart -->
  <div class="container-fluid">
     
     <!--batas ROWs  -->
  <div class="row">
    <!-- batas rows -->

    <div class="col-md-3">
      <!-- batas awal cards -->
  <div class="card" >
    <div class="card-body">
      <h5 class="card-title">Kontrak KBM  <span class="text-muted small pt-2 ps-1">| Alokasi <?php echo count($kkbm); ?> Unit</span></h5>
    <!-- batas chart start -->

<div style="width: 300px; height: auto;">
    <canvas id="chartMKBM"></canvas>
  </div>
  <script>
    const ctx = document.getElementById('chartMKBM');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Operation', 'Standby', 'Breakdown','Accident'],
        datasets: [{
          label: '',
          data: [
            <?php 
            echo count($data_ready),',', count($data_standby),',', count($data_breakdown),',', count($data_accident)
            ?>
          ],
          backgroundColor: [
            'rgb(69, 196, 49)',
            'rgb(210, 210, 210)',
            'rgb(255, 206, 86)',
            'rgb(255, 99, 132)',

         ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

    </div>
  </div>
<!-- batas end cards -->
    </div> 
<!-- batas ROW -->

<div class="col-md-3">
    <!-- batas awal cards -->
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Kontrak BDM  <span class="text-muted small pt-2 ps-1">| Alokasi <?php echo count($kbdm); ?> Unit</span></h5>
  <!-- batas chart start -->
  <div style="width: 300px; height: auto;">
  <canvas id="chartMBDM"></canvas>
</div>
<script>
  const ctx2 = document.getElementById('chartMBDM');

  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ['Operation', 'Standby', 'Breakdown','Accident'],
        datasets: [{
          label: '',
          data: [
            <?php 
            echo count($data_ready2),',', count($data_standby2),',', count($data_breakdown2),',', count($data_accident2)
            ?>
          ],
          backgroundColor: [
            'rgb(69, 196, 49)',
            'rgb(210, 210, 210)',
            'rgb(255, 206, 86)',
            'rgb(255, 99, 132)',
         ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

  </div>
</div>
<!-- batas end cards -->
  </div> 
<!-- batas ROW -->


<div class="col-md-3">
  <!-- batas awal cards -->
<div class="card" >
<div class="card-body">
  <h5 class="card-title">Rental BDM  <span class="text-muted small pt-2 ps-1">| Alokasi <?php echo count($rbdm); ?> Unit</span></h5>
<!-- batas chart start -->
<div style="width: 300px; height: auto;">
<canvas id="chartRBDM"></canvas>
</div>
<script>
const ctx3 = document.getElementById('chartRBDM');

new Chart(ctx3, {
  type: 'bar',
  data: {
    labels: ['Operation', 'Standby', 'Breakdown','Accident'],
        datasets: [{
          label: '',
          data: [
            <?php 
            echo count($data_ready3),',', count($data_standby3),',', count($data_breakdown3),',', count($data_accident3)
            ?>

          ],
          backgroundColor: [
            'rgb(69, 196, 49)',
            'rgb(210, 210, 210)',
            'rgb(255, 206, 86)',
            'rgb(255, 99, 132)',
         ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>

</div>
</div>
<!-- batas end cards -->
</div> 
<!-- batas ROW -->

<div class="col-md-3">
  <!-- batas awal cards -->
<div class="card" >
<div class="card-body">
  <h5 class="card-title">Rental KBM  <span class="text-muted small pt-2 ps-1">| Alokasi <?php echo count($rkbm); ?> Unit</span></h5>
<!-- batas chart start -->
<div style="width: 300px; height: auto;">
<canvas id="chartRKBM"></canvas>
</div>
<script>
const ctx4 = document.getElementById('chartRKBM');

new Chart(ctx4, {
  type: 'bar',
  data: {
    labels: ['Operation', 'Standby', 'Breakdown','Accident'],
        datasets: [{
          label: '',
          data: [
            <?php 
            echo count($data_ready4),',', count($data_standby4),',', count($data_breakdown4),',', count($data_accident4)
            ?>

          ],
          backgroundColor: [
            'rgb(69, 196, 49)',
            'rgb(210, 210, 210)',
            'rgb(255, 206, 86)',
            'rgb(255, 99, 132)',
         ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>

</div>

</div>
<!-- batas end cards -->
</div>
<!-- batas ROW -->
 
  </div>
  
  <!-- batas end row chart -->

  </div>
  <!-- wrap -->
   <div class="container-fluid">
   <a href="login" class="btn btn-primary"><i class="bi bi-plus-circle"></i></a>

   </div>

  


<div class="container-fluid">


  <!--batas ROWs  -->
<div class="row">
    <!-- end rows -->
    <div class="col-md-3 mt-5">
      <!-- batas awal cards -->
  <div class="card" >
    <div class="card-body">
    <div>
    <select name="filter" id="filter" onchange="getValue(this)">
                    <option value="">Filter </option>
                    <option value="Accident">Accident</option>
                    <option value="Breakdown">Breakdown</option>
                    <option value="Standby">Standby</option>
                    <option value="Operation">Operation</option>
                </select>
    </div>
    <script type="text/javascript">
      function getValue(event)
      {
        var value= event.value;
        alert(value);

      }
    </script>
      <h5 class="card-title">Kontrak KBM  <span class="text-muted small pt-2 ps-1">| 2</span></h5>
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
 

