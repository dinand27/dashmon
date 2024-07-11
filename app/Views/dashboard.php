<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>

<!-- bagian wrap chart -->
  <div class="d-flex flex-wrap">
     
     <!--batas ROWs  -->
  <div class="row">
    <!-- batas rows -->

    <div class="col-md-3">
      <!-- batas awal cards -->
  <div class="card" >
    <div class="card-body">
      <h5 class="card-title">Kontrak KBM  <span class="text-muted small pt-2 ps-1">| 1</span></h5>
    <!-- batas chart start -->

<div style="width: 300px; height: auto;">
    <canvas id="chartMKBM"></canvas>
  </div>
  <script>
    const ctx = document.getElementById('chartMKBM');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Accident', 'NoProd', 'Breakdown', 'Ready'],
        datasets: [{
          label: '',
          data: [12, 19, 3, 5],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(210, 210, 210)',
            'rgb(255, 206, 86)',
            'rgb(69, 196, 49)',
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
    <h5 class="card-title">Kontrak BDM  <span class="text-muted small pt-2 ps-1">| 2</span></h5>
  <!-- batas chart start -->
  <div style="width: 300px; height: auto;">
  <canvas id="chartMBDM"></canvas>
</div>
<script>
  const ctx2 = document.getElementById('chartMBDM');

  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ['Accident', 'NoProd', 'Breakdown', 'Ready'],
        datasets: [{
          label: '',
          data: [12, 19, 3, 5],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(210, 210, 210)',
            'rgb(255, 206, 86)',
            'rgb(69, 196, 49)',
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
  <h5 class="card-title">Rental BDM  <span class="text-muted small pt-2 ps-1">| 3</span></h5>
<!-- batas chart start -->
<div style="width: 300px; height: auto;">
<canvas id="chartRBDM"></canvas>
</div>
<script>
const ctx3 = document.getElementById('chartRBDM');

new Chart(ctx3, {
  type: 'bar',
  data: {
    labels: ['Accident', 'NoProd', 'Breakdown', 'Ready'],
        datasets: [{
          label: '',
          data: [12, 19, 3, 5],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(210, 210, 210)',
            'rgb(255, 206, 86)',
            'rgb(69, 196, 49)',
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
  <h5 class="card-title">Rental KBM  <span class="text-muted small pt-2 ps-1">| 4</span></h5>
<!-- batas chart start -->
<div style="width: 300px; height: auto;">
<canvas id="chartRKBM"></canvas>
</div>
<script>
const ctx4 = document.getElementById('chartRKBM');

new Chart(ctx4, {
  type: 'bar',
  data: {
    labels: ['Accident', 'NoProd', 'Breakdown', 'Ready'],
        datasets: [{
          label: '',
          data: [12, 19, 3, 5],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(210, 210, 210)',
            'rgb(255, 206, 86)',
            'rgb(69, 196, 49)',
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





  <!--batas ROWs  -->
<div class="row">
    <!-- end rows -->
    <div class="col-md-3 mt-5">
      <!-- batas awal cards -->
  <div class="card" >
    <div class="card-body">
      <h5 class="card-title">Kontrak KBM  <span class="text-muted small pt-2 ps-1">| 2</span></h5>
      <!-- table -->
      <table class="table table-borderless table-sm">
        <tbody>
          <?php foreach($kkbm as $d): ?>
          <tr>
            <td><?php echo $d['nolambung']; ?></td>
            <td><?php echo $d['waktu']; ?></td>
            <td><?php echo $d['status']; ?></td>
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

        <tr>
          <td>DT-310</td>
          <td>16:40</td>
          <td> <button type="button" class="btn btn-warning"></button></td>
        </tr>
       

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
        <tr>
          <td>DT-342</td>
          <td>16:40</td>
          <td> <button type="button" class="btn btn-warning"></button></td>
        </tr>
       
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
        <tr>
          <td>DT-342</td>
          <td>16:40</td>
          <td> <button type="button" class="btn btn-warning"></button></td>
        </tr>
      
      </tbody>
    </table>  

  </div>
</div>
<!-- batas end cards -->
  </div> 
<!-- batas ROW -->

</div>



<?php echo $this->endSection(); ?>
 

