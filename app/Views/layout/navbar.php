 <!-- bagian navbar -->
 <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?php echo base_url('/') ?>" >
                <img src="<?php echo base_url() ?>/assets/img/logosam_white.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Monitoring DT 
            </a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url('login') ?>">Home</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url('report') ?>">Report</a> 
                </li>
                <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url('report-detail') ?>">Report Detail</a> 
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