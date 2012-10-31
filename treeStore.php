<?php 
$id=$_GET['id'];
if (strcmp($id,"root")==0) {
?>
{"nodes":[{"text":"Account","id":"1","icon":"img/user.png"},{"text":"Vendor","id":"2","icon":"img/user.png"}
,{"text":"Customer","id":"3","icon":"img/user.png"}]}
<?php
}
?>
<?php 
if (strcmp($id,"1")==0) {
?>
{"nodes":[{"text":"Active","id":"11","leaf":"1","icon":"img/user_green.png"},{"text":"Disable","id":"12","leaf":"1","icon":"img/user_delete.png"}]}
<?php
}
?>
<?php 
if (strcmp($id,"2")==0) {
?>
{"nodes":[{"text":"Active","id":"21","leaf":"1","icon":"img/user_green.png"},{"text":"Disable","id":"22","leaf":"1","icon":"img/user_delete.png"}]}
<?php
}
?>
<?php 
if (strcmp($id,"3")==0) {
?>
{"nodes":[{"text":"Active","id":"31","leaf":"1","icon":"img/user_green.png"},{"text":"Disable","id":"32","leaf":"1","icon":"img/user_delete.png"}]}
<?php
}
?>