<?php
    // $con=mysqli_connect("localhost","my_user","my_password","my_db");
    $con=mysqli_connect("127.0.0.1","root","qwe123","test","3306");

    // Check connection
    if (mysqli_connect_errno($con))
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        echo "<br>MySQL 有連結到。<br>";
    }
	// Set autocommit to off
	echo "<br>關閉connect自動提交。<br>";mysqli_autocommit($con,FALSE);



    $sql = "INSERT INTO `test`.`table 3`"." ";
    $sql = $sql."(`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11`, `COL 12`, `COL 13`, `COL 14`, `COL 15`, `COL 16`, `COL 17`, `COL 18`, `COL 19`, `COL 20`, `COL 21`, `COL 22`, `COL 23`, `COL 24`, `COL 25`, `COL 26`, `COL 27`)"." ";
    $sql = $sql."VALUES (\'1\', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);"." ";


    $sql = "UPDATE `test`.`table 3`"." ";
    $sql = $sql."SET `COL 1` = \'2\', `COL 2` = \'3\', `COL 3` = \'4\'"." ";
    $sql = $sql."WHERE `table 3`.`COL 1` = \'1\';"." ";



	//Warning: #1265 Data truncated for column 'COL 2' at row 1  型態:varchar(2)
    $sql = "UPDATE `test`.`table 3` SET `COL 2` = \'1cs\' WHERE `table 3`.`COL 1` = \'1cst\';";

    //Warning: #1264 Out of range value for column 'COL 4' at row 1  型態:	tinyint(1)
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
    
    //	time(3)  秒 分數秒，小數點後3位，超過位數(四捨五入)
    $sql = "UPDATE `test`.`table 4` SET `col_TIME` = \'23:59:59.9995\' WHERE `table 4`.`tab3id` = 2;";
    

    //
    //
    //
    //







    $sql = $sql.""." ";

?>



<br><br>

<?php
	// Commit transaction
	//echo "<br>現在提交 connect。";mysqli_commit($con);/*還沒提交con 也是會驗證SQL 錯誤*/
    echo "<br>現在釋放 result。";mysqli_free_result($result);
    echo "<br>現在關閉 connect。";mysqli_close($con);
?>


<?php


?>
<?php /*function 打包程式 執行mysqli_query  有錯誤 提示錯誤 */
    function test_mysqli_query($con,$sql) {
    	mysqli_query($con,$sql);
    	if (mysqli_errno($con))
	    {
	    echo "<br>錯誤代碼: ".mysqli_errno($con)."<br>錯誤描述:".mysqli_error($con);
	    echo "<br>SQLSTATE錯誤代碼: ".mysqli_sqlstate($con);
	    //print_r(mysqli_error_list($con)); /*前三項錯誤組成ARRAY */
	    }else{
	    	//mysqli_commit($con);/*沒有錯誤就提交con*/
	    }
    } 
?><br>