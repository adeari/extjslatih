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
$data=array();
$i=0;
while($row = mysql_fetch_array($result))
  {
  	$data[$i]=array("id"=>$row['id'],"nama"=>$row['nama'],"alamat"=>$row['alamat']);
  	$i++;
  }
$data1=array("totalData"=>$totalData
,"data"=>$data);
echo json_encode($data1);
mysql_close($link);
?>