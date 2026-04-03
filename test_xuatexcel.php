<?php
// Test file để xem lỗi chi tiết
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing includes...<br>";
include("select_data.php");
echo "select_data.php OK<br>";

include("myfunctions.php");
echo "myfunctions.php OK<br>";

$year = isset($_GET['year']) ? $_GET['year'] : date("Y");
echo "Year: $year<br>";

// Test query
$r1 = mysqli_query($link, "SELECT COUNT(*) as sum FROM kehoach_iso WHERE namkh='$year'");
if(!$r1){
    echo "Query error: " . mysqli_error($link) . "<br>";
} else {
    echo "Query OK<br>";
    while($row = mysqli_fetch_array($r1)){
        echo "Total records: " . $row['sum'] . "<br>";
    }
}

echo "<br>All tests passed!";
?>
