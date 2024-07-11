<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Testing</h1>
        <table class="table" style="border: 1px;">
            <tr>
                <td>#</td>
                <td>nama</td>
            </tr>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['nm_project']; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>