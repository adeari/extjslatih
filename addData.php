<?
include "konek.php";
if (strlen($id)<1) {
$qry="insert into tb1 (nama,alamat) values ('".$nama."','".$alamat."');";
} else {
  $qry="update tb1 set nama='".$nama."',alamat='".$alamat."' where id=".$id.";";
}
mysql_query($qry);
echo "{success: true,msg:\"Data tersimpan\"}";

mysql_close($link);
?>