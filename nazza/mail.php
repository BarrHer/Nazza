<?php
$destination = ""; //hoareau.ben974@gmail.com
$subject = "Photos de vacances au poitou";
$body = "<html><head></head><body>prout</body></html>";
$altbody = "prout";
//$pj = __DIR__ . '/oui.jpg';
//$nompj = "chiasse.jpg";

include __DIR__ . '/controller/sendmail.php';
echo __DIR__ . '/controller/sendmail.php'.$subject.$destination;










?>