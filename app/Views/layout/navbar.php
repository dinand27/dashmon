 <!-- bagian navbar -->
 <?php $session= session(); ?>
 <div>
        <nav class="navbar navbar-expand navbar-dark bg-primary">
           
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url('/') ?>">Dashboard</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url('report-detail') ?>">Tables</a> 
                </li>
                <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url('report') ?>">Import</a> 
                </li>
                <?php 
                $sesi= $session->get('role');
                 if($sesi == 'admin') { ?>

                <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo base_url('report_rfid') ?>">Import RFID</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('report_dt') ?>">Import DT</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('equipment') ?>">Equipment</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('home3') ?>">Dashboard RFID</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url('logout') ?>">LogOut</a></li>
          </ul>
        </li>
                <?php } ?>


              </ul>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                <a class="navbar-brand" href="<?php echo base_url('/login') ?>" >
                <img src="<?php echo base_url() ?>/assets/img/logosam_white.png" width="30" height="30" class="d-inline-block align-top" alt="">
                <?php echo $session->get('namalengkap') ?>
            </a>
                </li>
              </ul>
            </div>
          </nav>
    </div>    <!--end bagian navbar -->

<h6>Data Tanggal : <span id="date" ></span>  
| Jam :     <span id="time"></span></h6>
</h6>


    <script>
      function displayDateTime() {
        let date = new Date();
        let dayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        let dayName = dayNames[date.getDay()];
        let monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        let monthName = monthNames[date.getMonth()];
        let day = date.getDate();
        let year = date.getFullYear();
        let hours = date.getHours();
        let ampm = hours >= 12 ? "PM" : "AM";
        hours = hours % 12;
        hours = hours ? hours : 12;
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();

        let dateString = `${dayName}, ${day} ${monthName} ${year}`;
        document.getElementById("date").innerHTML = dateString;

        let timeString = `${hours}:${minutes}:${seconds} ${ampm}`;
        document.getElementById("time").innerHTML = timeString;
      }

      setInterval(displayDateTime, 1000);
    </script>