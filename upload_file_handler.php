<?php
$uploaddir = '/var/www/localhost/htdocs/IOT_C2/uploads/';
$uploadfile = $uploaddir . basename($_FILES['filename']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
    echo 'Here is some more debugging info:';
    print_r($_FILES);
    print_r("uploadfile: ");
    print_r($uploadfile);
}
print "</pre>";

?>
