<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       $session = \Config\Services::session();
     if ($session->get('id')){
        echo 'id Terpilih : '.$session->get('id');
        echo 'Project ID : '.$session->get('idproject');
        echo 'Unit : '.$session->get('unit');
    }else { 
        echo 'session kosong';
    } 

     ?>
    <h1>halaman Add session</h1>
    <input type="button" value = "1" id="1" onclick="f(1);">
    <input type="text" id="total" placeholder="0">
    <br>
    <?php ?>
    <button onclick="reset()" >Reset</button>

    <script>
        var sum = 0;

function f(val){
    if(!val){ sum=0;
        document.getElementById("total").value = sum;
    }
  sum += val;
  document.getElementById("total").value = sum;
}
function reset(){
  sum = 0;
  document.getElementById("total").value = sum;
}
    </script>
</body>
</html>