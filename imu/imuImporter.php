<?php
require_once "imuSearch.php";

print "<pre>";
collectData();
print "</pre>";


function collectData()
{
  $terms = array("AdmPublishWebNoPassword","Yes");
  $columns = array("SummaryData");

  $host = "localhost";
  $port = "20082";

  $imu = new imuSearch($host, $port);
  $imu->connect();
  $results = $imu->search("ecatalogue", $columns, $terms);

  print_r($results);
}

 ?>
