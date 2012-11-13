<?php
/************************************\
* Multi interface in PHP with curl  *
* Requires PHP 5.0, Apache 2.0 and  *
* Curl 				    *
*************************************
* Writen By Cyborg 19671897         *
* Bugfixed by Jeremy Ellman         *
\***********************************/

$url="http://google.co.id";

$mh = curl_multi_init();


       $conn=curl_init($url);
       curl_setopt($conn,CURLOPT_RETURNTRANSFER,1);//return data as string 
       curl_setopt($conn,CURLOPT_FOLLOWLOCATION,1);//follow redirects
       curl_setopt($conn,CURLOPT_MAXREDIRS,2);//maximum redirects
       curl_setopt($conn,CURLOPT_CONNECTTIMEOUT,10);//timeout
       curl_multi_add_handle ($mh,$conn);

do { $n=curl_multi_exec($mh,$active); } while ($active);


       $res=curl_multi_getcontent($conn);
       curl_multi_remove_handle($mh,$conn);
       curl_close($conn);
       
curl_multi_close($mh);


echo $res;

?>