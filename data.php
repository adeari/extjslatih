<?php
include ("konek.php");
$start=$_GET['start'];
$limit=$_GET['limit'];
$totalData=0;
$qry="SELECT count(*) as jumlah FROM tb1 ";
$result = mysql_query($qry);
if ($row = mysql_fetch_array($result)) {
  $totalData=$row['jumlah'];
}
$qry="SELECT id,nama,alamat FROM tb1 ";
$qry.= " LIMIT ".$start." , ".$limit;
$result = mysql_query($qry);
$data="";
while($row = mysql_fetch_array($result))
  {
  $data.="{\"id\":\"". $row['id'] . "\",\"nama\":\"". $row['nama'] . "\",\"alamat\":\"" . $row['alamat']."\"},";
  }
  if (strlen($data)>0) {
    $data=substr($data,0,strlen($data)-1);
  }
echo "{\"totalData\":\"".$totalData."\",\"data\":[".$data."]}";
mysql_close($link);
?>