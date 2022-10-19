<!DOCTYPE html>
<html>
<head>
  <title>Store form data in .txt file</title>
</head>
<body>
  <form method="post">
    Enter Your Text Here:<br>
    <input type="text" name="reading"><br>
    <input type="submit" name="submit">

  </form>

</body>
</html>

<?php

$datafile = './uploads/data.dat';

if(isset($_POST['reading']))
{
$data=$_POST['reading'];

$fp = fopen($datafile, 'a');

fwrite($fp, $data);
//fwrite($fp, "\r\n");
fclose($fp);
}
?>
