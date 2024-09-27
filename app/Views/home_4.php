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
  background: #7c8692;
  color : #fff;
  
}
.newColor {
    background-color: yellow;
}
.OPERATION{
  background-color: #1de9b64d;
}
.STANDBY{
  background-color: #03a9f44d;
}
.BREAKDOWN{
  background-color: #ff98004d;
}
.ACCIDENT{
  background-color: #d81b604d;
}

.container{
  background-color: #00000;


  .sortable th {
   cursor: pointer;
}
.sortable th.no-sort {
   pointer-events: none;
}
.sortable th::after, 
.sortable th::before {
 transition: color 0.2s ease-in-out;
 font-size: 1.2em;
 color: transparent;
}
.sortable th::after {
   margin-left: 3px;
   content: '\025B8';
}
.sortable th:hover::after {
   color: inherit;
}
.sortable th.dir-d::after {
   color: inherit;
   content: '\025BE';
}
.sortable th.dir-u::after {
   color: inherit;
   content: '\025B4';
}




}

</style>

<div class="container-fluid">
<h1 class="d-flex justify-content-center">Monitoring Utilisasi Unit (Edit)</h1>
<div class="text-center"><h6>
<span id="date" ></span>   <span id="time"></span>
</h6>
</div>
<div class="row justify-content-lg-around">

<?php foreach($project as $p): ?>

  <?php
  $db = \Config\Database::connect();
  $idpro= $p['id'];
  $query= $db->query("SELECT * FROM report_rfid WHERE newproject = $idpro");
  $query_acd= $db->query("SELECT * from report_rfid WHERE dt_status ='ACD' AND newproject= $idpro ");
  $query_stb= $db->query("SELECT * from report_rfid WHERE dt_status='STD' AND newproject= $idpro ");
  // $query_bd= $db->query("SELECT * from report_rfid WHERE (dt_status='HMSI' OR dt_status='SA' OR dt_status= 'HONG' OR dt_status= 'Breakdown') AND idproject_rfid= $idpro ");
  $query_bd= $db->query("SELECT * from report_rfid WHERE dt_status='BD'  AND newproject= $idpro ");
  $query_opr= $db->query("SELECT * from report_rfid WHERE dt_status='OPR' AND newproject= $idpro ");
  $query_kms= $db->query("SELECT * from report_rfid WHERE dt_status='KMS' AND newproject= $idpro ");
  $query_ts= $db->query("SELECT * from report_rfid WHERE dt_status='TS' AND newproject= $idpro ");
  $data= $query->getResult(); 
  $acd= $query_acd->getResult();
  $bd= $query_bd->getResult();
  $stb= $query_stb->getResult();
  $opr= $query_opr->getResult(); 
  $kms= $query_kms->getResult(); 
  $ts= $query_ts->getResult(); 

?>

      <div class="col-md-auto mt-4">
      <div class="card">
       
<div style="width: 600px; height: auto;">
<!-- testing -->
<div>
  <?php
  $countacd= 0;
  $countbd= 0;
  $countstb= 0;
  $countopr= 0;
  $countkms= 0;
  $countts= 0;
    

  if(count($acd) > 0){
    $countacd= count($acd) ;
  }else { $countacd= '' ; }
  
  if(count($bd) > 0){
    $countbd= count($bd) ;
  }else { $countbd= '' ; }

  if(count($stb) > 0){
    $countstb= count($stb) ;
  }else { $countstb= '' ; }

  if(count($opr) > 0){
    $countopr= count($opr) ;
  }else { $countopr= '' ; }
  
  if(count($kms) > 0){
    $countkms= count($kms) ;
  }else { $countkms= '' ; }
  
  if(count($ts) > 0){
    $countts= count($ts) ;
  }else { $countts= '' ; }
  
?>
<!-- testing -->

</div>
          <!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $p['id']; ?>">
<i class="bi bi-text-left"></i>
</button>
<!-- <div class="container"> -->
<canvas id="<?php echo $p['id']; ?>"></canvas>
<!-- </div> -->
  
</div>
  <!-- Modal -->
  <div class="modal fade"  id="exampleModal<?php echo $p['id']; ?>" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="max-height:75vh;overflow-y:auto;">
      <div id="relative-parent">

      <!-- <div class="table-responsive"> -->
        <!-- <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script> -->
         
  <table class="sortable" id="myTable">
    <thead>
      <tr class="table table-dark" >
        <th class="text-center">UNIT</th>
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
      case "OPR" :
      $status= "OPERATION";
      break;
      case "STD":
        $status= "STANDBY";
      break;
      case "BD":
        $status= "BREAKDOWN";
      break;
      case "ACD":
        $status= "ACCIDENT";
        break;
      case "KMS":
        $status= "KOMISIONING";
        break;
      case "TS":
        $status= "TEKOR SOLAR";
        break;
      default:
      $status= "uNDIFINe";
      }
        ?>

    <tr  class="<?php echo $status ?>">
      <td class="text-center"><?php echo $dat->unit; ?> </td>
      <td><?php $dat->dt_status; echo $status; ?>  </td> 
      <td ><?php echo $dat->driver; ?> </td>
      <td ><?php echo $dat->driver_status ?> </td>
      <td class="text-center" ><?php echo $dat->jam_keluar ?> </td>
      <td class="text-center"><?php echo $dat->jam_masuk ?> </td>
      <td class="text-center"><?php echo $dat->jam_bd ?> </td>
      <td class="text-center"><?php echo $dat->jam_done ?> </td>

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
  Chart.defaults.font.size = 14;
  // Chart.defaults.font.family= "Arial";
  const ctx<?php echo $p['id']; ?> = document.getElementById("<?php echo $p['id']; ?>");
  new Chart(ctx<?php echo $p['id']; ?>, {
    
    type: 'bar',
    data: {
      labels: ['ACD','KMS','TS','OPR', 'STB', 'BD'],
      datasets: [{  
        font: {
                size: 12
              },
        label:'',
        datalabels:{
          rotation:0,
          align: 'top',
          font: {
            weight:'800',
            size:12,
            // lineHeight: 5.5,
            color: '#000', 
          }
        },
       data: [
          <?php
            echo $countacd,',', $countkms,',', $countts,',', $countopr,',',$countstb,',',$countbd 
            ?>
        ], 
        backgroundColor: [
                'rgba(29, 233, 182, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(29, 233, 182, 0.6)',
                'rgba(39, 92, 245, 0.8)',   
                'rgba(245, 61, 62, 0.7)',

            ],
            borderColor: [
              'rgba(255, 152, 0, 0.6)',
              'rgba(255, 152, 0, 0.6)',
              'rgba(255, 152, 0, 0.6)',
              'rgba(255, 152, 0, 0.6)',
              'rgba(255, 152, 0, 0.6)',
              'rgba(255, 152, 0, 0.6)',

            ],
        borderWidth: 1
      }]
    },
    plugins: [ChartDataLabels],
    options: {
      plugins:{
        // title:{
        //   display: true,
        //   text: ['<?php echo $p['namaproject'], "  | Alokasi Unit :",  count($data) ; ?>'],
        //   padding:{
        //     top:10,
        //     bottom:20
        //   }
        // }
      },
      scales: {
        y: {
          ticks: {
                    padding: 20 // Jarak antara label sumbu Y dan grafik
                },
          min:0,
          max: <?php 
          $max= max($countacd, $countkms, $countts, $countopr,$countstb,$countbd); 
          $persen= 0.3 * (int)$max;
          echo $persen + (int)$max;
          ?>, 
          beginAtZero: true,
        }
      },
      plugins:{
        legend:{
          labels:{
            boxWidth:0,
          },
          title:{
          display: true,
          text: [
            '<?php echo $p['namaproject'] ?>',
            '<?php echo ' Alokasi Unit : ',  count($data) ; ?>'
          ],
          padding:{
            top:5,
            bottom:5
          }
        },
        }
      }
    }
  });
</script>
      </div>
      <?php endforeach; ?>
      

<!-- batas row -->
</div>
 

</div>


</div>




<!-- bats script sort table -->

<script>
  document.addEventListener('click', function (e) {
  try {
    function findElementRecursive(element, tag) {
      return element.nodeName === tag ? element : 
       findElementRecursive(element.parentNode, tag)
    }
    var descending_th_class = ' dir-d '
    var ascending_th_class = ' dir-u '
    var ascending_table_sort_class = 'asc'
    var regex_dir = / dir-(u|d) /
    var regex_table = /\bsortable\b/
    var alt_sort = e.shiftKey || e.altKey
    var element = findElementRecursive(e.target, 'TH')
    var tr = findElementRecursive(element, 'TR')
    var table = findElementRecursive(tr, 'TABLE')
    function reClassify(element, dir) {
      element.className = element.className.replace(regex_dir, '') + dir
    }
    function getValue(element) {
      return (
        (alt_sort && element.getAttribute('data-sort-alt')) || 
      element.getAttribute('data-sort') || element.innerText
      )
    }
    if (regex_table.test(table.className)) {
      var column_index
      var nodes = tr.cells
      for (var i = 0; i < nodes.length; i++) {
        if (nodes[i] === element) {
          column_index = element.getAttribute('data-sort-col') || i
        } else {
          reClassify(nodes[i], '')
        }
      }
      var dir = descending_th_class
      if (
        element.className.indexOf(descending_th_class) !== -1 ||
        (table.className.indexOf(ascending_table_sort_class) !== -1 &&
          element.className.indexOf(ascending_th_class) == -1)
      ) {
        dir = ascending_th_class
      }
      reClassify(element, dir)
      var org_tbody = table.tBodies[0]
      var rows = [].slice.call(org_tbody.rows, 0)
      var reverse = dir === ascending_th_class
      rows.sort(function (a, b) {
        var x = getValue((reverse ? a : b).cells[column_index])
        var y = getValue((reverse ? b : a).cells[column_index])
        return isNaN(x - y) ? x.localeCompare(y) : x - y
      })
      var clone_tbody = org_tbody.cloneNode()
      while (rows.length) {
        clone_tbody.appendChild(rows.splice(0, 1)[0])
      }
      table.replaceChild(clone_tbody, org_tbody)
    }
  } catch (error) {
  }
});
</script>



<!-- batas script table -->


<?php echo $this->endSection(); ?>
 

