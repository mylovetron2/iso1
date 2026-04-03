
<head>
          <meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--

</style>
</head>
<?php
include ("select_data.php") ;
include ("myfunctions.php") ;
$mavt =  isset($_GET['mavt']) ? $_GET['mavt'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$mavattu = isset($_POST['mavattu']) ? $_POST['mavattu'] : '';
if ($submit =="") {
echo "<form  action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"upload\">";
echo "<input type=\"file\" id=\"file\" name=\"fileToUpload\" />";
echo "<input type=\"hidden\" name=\"mavattu\" value=\"$mavattu\" />
	<input type=\"submit\" name=\"submit\" value=\"Upload\" />
     </form>
     ";
}else{
if (!file_exists("TLKT/$mavattu/")) mkdir("TLKT/$mavattu/");
$folder="TLKT/$mavattu/";
echo $_FILES['fileToUpload']['tmp_name'];
$target_file = $folder . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$insert = "insert into tailieu_iso(
mavattu,
tenlink
)values(
'$mavattu',
'$target_file'
)" ;
mysql_query($insert) or die(mysql_error());

echo $uploadOk;
} 
?> 
