<?php
include dirname(__file__).'/inc/inc.php';
?>
<?php 
    // echo(memory_get_usage(true).'<br>');
    // echo '<br>';
    // $conInv->tesst();

function issePOST($val)
{
    $issePOST = "";
    if(isset($_POST[$val])){
        $issePOST = $_POST[$val];
    }
    return $issePOST;
}
$Speed = issePOST("Speed");
$maxTr = issePOST("maxTr");










    $con = $conInv->conn();

    // echo(memory_get_usage().'<br>');

    $sql = "INSERT INTO"." `test1` ( `Speed`, `maxTr`) VALUES ( '".$Speed."', '".$maxTr."' )";

    $conInv->test_query($con,$sql);

    $conInv->close($con);
    // echo(memory_get_usage().'<br>');



?>