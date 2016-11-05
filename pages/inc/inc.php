<?php
include dirname(__file__).'/conn/conn.php';
include dirname(__file__).'/websetup.php';
$webs = new webs();
$conInv = new conInv();
$conInv -> conn_dbSource = $webs -> conn_dbSource;




?>
