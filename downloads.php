

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="bg-dark">
  <?php include 'header.php';?>

<div class="container">
<table class="table table-dark table-striped">
  <tr>
    <th>ID</th>
    <th>Filepath</th>
    <th>Play</th>
  </tr>
<?php

include 'config.php';

$getdownloads = "SELECT * FROM downloads ORDER BY id DESC";

$res = mysqli_query($connect, $getdownloads);

while($row = mysqli_fetch_array($res)){
    $filepath = $row['file_path'];
    $id = $row['id'];

    echo "
    <tr>
    <td>{$id}</td>
    <td>{$filepath}</td>
    <td>
    <audio controls>
  <source src='{$filepath}' type='audio/mpeg'>
Your browser does not support the audio element.
</audio>
</td>
</tr>";
}?>

 
</table> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>