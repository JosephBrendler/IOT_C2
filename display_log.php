<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="0.5">
  <body>
    <h2>Here's my sensor data</h2>
    <p>This should refresh every few seconds.</p>
  </body>
</head>
</html>

<?php
$myfile = fopen("./uploads/status.dat", "r") or die("Unable to open file!");
// Output one line until end-of-file
$status_data = fread($myfile,filesize("./uploads/status.dat"));
fclose($myfile);
switch ($status_data) {
    case "Initialized\n":
        $bg_color = "gray";
        break;
    case "Detected!\n":
        $bg_color = "red";
        break;
    case "Stopped\n":
        $bg_color = "gray";
        break;
    default:
        break;
}
//printf ("status_data: [%s]<br>", $status_data);
 ?>

<!-- generate the display_log_frame section -->

<style>
  .status-color-box {
    <?php printf ( "background-color: %s;", $bg_color ); ?>
    color: white;
    width: auto;
    height: 20px;
    margin: 4px;
    padding: 10px;
  }
</style>

<html><table>
  <tr>
    <td>Motion status:</td>
    <td><div class="status-color-box">
      <center><?php print ($status_data); ?></center>
    </div></td?
  </tr>
</table>
</html>

<style>
  .log-frame-div {
    width: 80%;
    height: 350px;
  }
</style>

<html>
  <p><div class="log-frame-div" frameboarder="0" >
    <?php
      $file = fopen("./uploads/data.dat", "r");
      $lines = array();

      while (!feof($file)) {
        $line = fgets($file);
        $line = trim($line);
        $lines[] = $line;
      }
      fclose($file);
      for ( $indx = sizeof($lines) - 2; $indx >= sizeof($lines) - 27; $indx-- ) {
//      print ('testing<br>');
        printf ("%d: %s<br>", $indx, $lines[$indx]);
      }
    ?>
  </div></p>
</html>
