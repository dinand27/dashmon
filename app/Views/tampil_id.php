<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo base_url('tampilsemua/filter') ?>" method="get">
    <select name="status" id="status" onchange="this.form.submit()">
         <option value="Status">Pilih Status</option>
         <option value="Operation">Operation</option>
         <option value="Breakdown">Breakdown</option>
   </select>
   <!-- <input type="submit" value="Search" class="btn btn-primary"> -->
    </form>
    <div>
    <table class="table" style="border: 1px;" >
            <tr>
                <td>#</td>
                <td>nama</td>
                <td>Status</td>
            </tr>
            <tr>
                <?php foreach($data as $data): ?>
                <td><?php echo $data->id; ?></td>
                <td><?php echo $data->nolambung; ?></td>
                <td><?php echo $data->status; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>