<?php echo $this->extend('layout/header'); ?>
<?php echo $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<style>
  #relative-parent{
  position: relative;
}
table{
  width:100%;
  border-collapse: collapse; 
}
th{
  position: sticky;
  top : 0px;
  background: #000;
  color : #fff;
}
.newColor {
    background-color: yellow;
}
.OPERATION{
  background-color: #1DE9B6;
}
.STANDBY{
  background-color: #03A9F4;
}
.BREAKDOWN{
  background-color: #FFB84B;
}
.ACCIDENT{
  background-color: #FA3A3A;
}

</style>

<div class="container-fluid">
<h1 class="d-flex justify-content-center">Monitoring Utilisasi Unit (DT)</h1>
<div class="text-center"><h6>
<span id="date" ></span>   <span id="time"></span>
</h6>
</div>
<div class="row justify-content-lg-around">

<?php foreach($project as $p): ?>

  <?php
  $db = \Config\Database::connect();
  $idpro= $p['id'];
  $query= $db->query("SELECT * FROM report_rfid WHERE idproject_rfid = $idpro");
  $query_acd= $db->query("SELECT * from report_rfid WHERE dt_status ='ACD' AND idproject_rfid= $idpro ");
  $query_stb= $db->query("SELECT * from report_rfid WHERE dt_status='Standby' AND idproject_rfid= $idpro ");
  $query_bd= $db->query("SELECT * from report_rfid WHERE (dt_status='HMSI' OR dt_status='SA' OR dt_status= 'HONG' OR dt_status= 'Breakdown') AND idproject_rfid= $idpro ");
  $query_opr= $db->query("SELECT * from report_rfid WHERE dt_status='DT Keluar Camp' AND idproject_rfid= $idpro ");
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
  <!-- Modal -->
  <div class="modal fade"  id="exampleModal<?php echo $p['id']; ?>" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="relative-parent">

      <!-- <div class="table-responsive"> -->
        <!-- <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script> -->
         
  <table class="table-responsive" id="myTable">
    <thead>
      <tr class="table table-dark" >
        <th >UNIT</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">DRIVER</th>
        <th class="text-center">KETERANGAN</th>
        <th class="text-center">OUT</th>
        <th class="text-center">IN</th>
        <th class="text-center">BD</th>
        <th class="text-center">DONE</th>
      </tr>
    </thead>
    <tbody>

    <?php foreach($data as $dat): ?>
      <?php 
      $status= "";
      $stat = $dat->dt_status;
      switch ($stat) {
      case "DT Keluar Camp" :
      $status= "OPERATION";
      break;
      case "Standby":
        $status= "STANDBY";
      break;
      case "Breakdown":
        $status= "BREAKDOWN";
      break;
      case "Accident":
        $status= "ACCIDENT";
        break;
      default:
      $status= "uNDIFINe";
      }
        ?>

    <tr  class="<?php echo $status ?>">
      <td><?php echo $dat->unit; ?> </td>
      <td><?php $dat->dt_status; echo $status; ?>  </td> 
      <td ><?php echo $dat->driver; ?> </td>
      <td ><?php echo $dat->driver_status ?> </td>
      <td ><?php echo $dat->jam_keluar ?> </td>
      <td ><?php echo $dat->jam_masuk ?> </td>
      <td ><?php echo $dat->jam_bd ?> </td>
      <td ><?php echo $dat->jam_done ?> </td>

    </tr>
    <?php endforeach; ?>

    </tbody>

 
  </table>
      <!-- </div> -->

        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx<?php echo $p['id']; ?> = document.getElementById("<?php echo $p['id']; ?>");
  new Chart(ctx<?php echo $p['id']; ?>, {
    plugins: [ChartDataLabels],
    type: 'bar',
    data: {
      labels: ['OPR', 'STB', 'BD', 'ACD'],
      datasets: [{  
        font: {
                        size: 12
                    },
        label: '<?php echo $p['nm_project'],' | Alokasi Unit : ', count($data) ; ?>',
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


</div>



<?php echo $this->endSection(); ?>
 

