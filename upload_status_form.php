<!DOCTYPE html>
<html>
<head>
  <title>Store form data in .txt file</title>
</head>
<body>
  <form method="post">
    Enter Your Text Here:<br>
    <input type="text" name="status"><br>
    <input type="submit" name="submit">

  </form>

</body>
</html>

<?php

$datafile = './uploads/status.dat';

if(isset($_POST['status']))
{
$data=$_POST['status'];

$fp = fopen($datafile, 'w');

fwrite($fp, $data);
fclose($fp);
}
?>
