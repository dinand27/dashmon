<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="container-fluid">
<h1 class="d-flex justify-content-center">Monitoring Utilisasi DT</h1>
<div class="text-center"><h6>
<span id="date" ></span>   <span id="time"></span>
</h6>
</div>
<div class="row justify-content-lg-around">

<?php foreach($project as $p): ?>

  <?php
  $db = \Config\Database::connect();
  $idpro= $p['id'];
  $query= $db->query("SELECT * FROM report WHERE idproject = $idpro ");
  $query_acd= $db->query("SELECT * from report WHERE status='ACD' AND idproject= $idpro ");
  $query_stb= $db->query("SELECT * from report WHERE status='STB' AND idproject= $idpro ");
  $query_bd= $db->query("SELECT * from report WHERE (status='HMSI' OR status='SA' OR status= 'HONG') AND idproject= $idpro ");
  $query_opr= $db->query("SELECT * from report WHERE status='OPR' AND idproject= $idpro ");
  $data= $query->getResult(); 
  $acd= $query_acd->getResult();
  $bd= $query_bd->getResult();
  $stb= $query_stb->getResult();
  $opr= $query_opr->getResult(); 
?>

      <div class="col-md-auto mt-4">
      <div class="card">
       
<div style="width: 400px; height: auto;">

          <!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $p['id']; ?>">
<i class="bi bi-text-left"></i>
</button>
  <canvas id="<?php echo $p['id']; ?>"></canvas>
</div>

<!-- Modal atas -->
  <div class="modal fade" id="exampleModal<?php echo $p['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">

  <table class="table table-sm table-bordered table-dark">
    <thead>
      <tr class="text-center" >
        <th>UNIT</th>
        <th>STATUS</th>
        <th>KET</th>

      </tr>
    </thead>
    <tbody>
    <?php foreach($data as $dat): ?>
    <tr>
      <td   class="text-center"><?php echo $dat->id_unit ?> </td>
      <td   class="text-center" ><?php echo $dat->status ?> </td> 
      <td><?php echo $dat->keterangan ?> </td>

    </tr>
    <?php endforeach; ?>

    </tbody>
  </table>

        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modalbawah -->



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx<?php echo $p['id']; ?> = document.getElementById("<?php echo $p['id']; ?>");
  new Chart(ctx<?php echo $p['id']; ?>, {
    plugins: [ChartDataLabels],
    type: 'bar',
    data: {
      labels: ['OPR', 'STB', 'BD', 'ACD'],
      datasets: [{
        label: ' <?php echo $p['nm_project'],' | Alokasi Unit : ', count($data); ?>',
        data: [
          <?php echo count($opr),',', count($stb),',', count($bd),',', count($acd) ?>
        ], 
        backgroundColor: [
                'rgba(29, 233, 182, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(216, 27, 96, 0.6)',

            ],
            borderColor: [
                'rgba(29, 233, 182, 1)',
                'rgba(3, 169, 244, 1)',
                'rgba(255, 152, 0, 1)',
                'rgba(216, 27, 96, 1)',
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




      <?php endforeach; ?>
      

<!-- batas row -->
</div>
 

</div>

<!-- testingmodal atas -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal tes
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="max-height:60vh;overflow-y:auto;">
        <table class="table table-striped"> 
          <tr>
            <td>no</td>
            <td>Unit</td>
            <td>status</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
          <tr>
            <td>1</td>
            <td>DT-XxXYYY</td>
            <td>Standby</td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <!-- testingmodal bawah -->


</div>




<?php echo $this->endSection(); ?>
 

