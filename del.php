<?
include "konek.php";
$id=$_POST['id'];
if (strlen($id)>0) {
  $qry="delete from tb1 where id=".$id.";";
}
mysql_query($qry);
echo "{success: true}";

mysql_close($link);
?>