<?php
$link = mysql_connect('localhost', 'root', 'root', 'analytics');

if (!$link) {
    die('Connect Error (' . mysql_connect_errno() . ') '
            . mysql_connect_error());
}

echo 'Success... ' . mysql_get_host_info($link) . "\n";

mysql_close($link);
?>
