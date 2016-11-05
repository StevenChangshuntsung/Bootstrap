<?php
include dirname(__file__).'/inc/inc.php';
?>

<?php 
    echo(memory_get_usage(true).'<br>');
    echo '<br>';
    $a = new conInv();
    $a->tesst();

    $con = $a->conn($conn_dbSource);

    echo(memory_get_usage().'<br>');

    $sql = "INSERT INTO"." `ccode` ( `Enab`, `group1`) VALUES ( '1', '01' )";

    //$a::test_query($con,$sql);
    /*Deprecated: Non-static method conInv::errMsg_query()    
    以棄用$a::test_query()  改用  $a->test_query()*/
    $a->test_query($con,$sql);

    $a->close($con);



?>
<?php 
    // $con = $a->conn();

    // /*基本新增 SQL*/
    // $sql = "INSERT INTO"." `ccode` ( `Enab`, `group1`) VALUES ( '1', '01' )";

    // $a::test_query($con,$sql);
    // $a->close($con);
 ?>
 
<?php 
    $a->conn_dbSource["username"] = 'test';
    // $con = $a->conn();


    /*基本新增 SQL*/
    //$sql = "INSERT INTO"." `ccode` ( `Enab`, `group1`) VALUES ( '1', '01' )";



// echo $a->conn_dbSource["username"];















    // $a::test_query($con,$sql);
    // $a->close($con);

 ?>






























<?php 
/**
 * 最基本連接:
 *mysqli_connect 連結到資料庫
 *mysqli_autocommit 關閉connect自動提交
 *mysqli_query  執行sql
 *mysqli_commit  提交
 *mysqli_close  關閉 connect
 */
    // $con=mysqli_connect("127.0.0.1","cst","123456","dbcst","3306");
    // if (mysqli_connect_errno($con))
    // {
    // echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }else{
    //     echo "<br>MySQL 有連結到。<br>";
    // }
    // echo "<br>關閉connect自動提交。<br>";mysqli_autocommit($con,FALSE);
    // $sql = "INSERT INTO"." `ccode` ( `Enab`, `group1`) VALUES ( '1', '01' )";
    // mysqli_query($con,$sql);
    // mysqli_commit($con);
    // echo "<br>現在關閉 connect。";mysqli_close($con);
?>

<?php /**
 * 測試 提示錯誤 丟出內容(測試有錯誤的時候 會有哪些報告 )
 */ 

// $con = get_conn();
// test_mysqli_query($con,$sql);




/**
 * 舊資料  還沒整理
 */
$sql = "INSERT INTO `test`.`table 3`"." ";
    $sql = $sql."(`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11`, `COL 12`, `COL 13`, `COL 14`, `COL 15`, `COL 16`, `COL 17`, `COL 18`, `COL 19`, `COL 20`, `COL 21`, `COL 22`, `COL 23`, `COL 24`, `COL 25`, `COL 26`, `COL 27`)"." ";
    $sql = $sql."VALUES (\'1\', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);"." ";


    $sql = "UPDATE `test`.`table 3`"." ";
    $sql = $sql."SET `COL 1` = \'2\', `COL 2` = \'3\', `COL 3` = \'4\'"." ";
    $sql = $sql."WHERE `table 3`.`COL 1` = \'1\';"." ";



    //Warning: #1265 Data truncated for column 'COL 2' at row 1  型態:varchar(2)
    $sql = "UPDATE `test`.`table 3` SET `COL 2` = \'1cs\' WHERE `table 3`.`COL 1` = \'1cst\';";

    //Warning: #1264 Out of range value for column 'COL 4' at row 1  型態:    tinyint(1)
    $sql = "UPDATE `test`.`table 3` SET `COL 4` = \'-129\' WHERE `table 3`.`COL 1` = \'1cst\';";





    //table 4  新增一行
    $sql = "INSERT INTO `test`.`table 4` (`tab3id`, `col_INT`, `col_VARCHAR`, `col_TEXT`, `col_DATE`, `col_TIME`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL);";
    
    //Warning: #1264 Out of range value for column 'col_INT' at row 1
    $sql = "UPDATE `test`.`table 4` SET `col_INT` = \'2147483648\' WHERE `table 4`.`tab3id` = 1;";
    
    //Warning: #1265 Data truncated for column 'col_VARCHAR' at row 1
    $sql = "UPDATE `test`.`table 4` SET `col_VARCHAR` = \'12345678910\' WHERE `table 4`.`tab3id` = 1;";
    
    //Warning: #1265 Data truncated for column 'col_TEXT' at row 1
    //中文字數21845、英文65535

    //DATE '2016.01.29'、'2016/01/29'、'20160129'。'2016-01-29' <--都會轉成這種
    //Warning: #1265 Data truncated for column 'col_DATE' at row 1
    $sql = "UPDATE `test`.`table 4` SET `col_DATE` = \'2016-01-29 123\' WHERE `table 4`.`tab3id` = 2;";
    
    //  time(3)  秒 分數秒，小數點後3位，超過位數(四捨五入)
    $sql = "UPDATE `test`.`table 4` SET `col_TIME` = \'23:59:59.9995\' WHERE `table 4`.`tab3id` = 2;";



/**
 * 
 */





// mysqli_close($con);
?>

