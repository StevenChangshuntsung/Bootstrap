<?php
namespace dbMySQLi { 
include './ovAPP.php';
include './ovCS.php';
include './ovWP.php';  
$dbSource = array(
	    "host" => "127.0.0.1",
	    "username" => "root",
	    "password" => "qwe123",
	    "dbname" => "test",
	    "port" => "3306",
	    "socket" => "",
		);
//***ovCS***
function get_ShowColumns($dbtable, $con2) { 
	if(!$con2){
		$con2 = ovWP\wps\get_conn();
		ovCS\get_ShowColumns($dbtable, $con2);
		mysqli_close($con2);
	}else{
		ovCS\get_ShowColumns($dbtable, $con2);
	}
}
//***ovCS***
//***egs***
function sen_dbINArray($dbSQLArray, $dbtable, $con2) { 
	if(!$con2){
		$con2 = ovWP\wps\get_conn();
		ovWP\egs\sen_dbINArray($dbSQLArray, $dbtable, $con2 );
		mysqli_close($con2);
	}else{
		ovWP\egs\sen_dbINArray($dbSQLArray, $dbtable, $con2 );
	}

}
function get_dbvalu($sql, $con2) { 
	if(!$con2){
		$con2 = ovWP\wps\get_conn();
		return ovWP\egs\get_dbvalu($sql, $con2);
		mysqli_close($con2);
	}else{
		return ovWP\egs\get_dbvalu($sql, $con2);
	}

}
function get_dbvaluArray($sql, $con2, $arrType) { 
	if(!$con2){
		$con2 = ovWP\wps\get_conn();
		return ovWP\egs\get_dbvaluArray($sql,$con2,$arrType);
		mysqli_close($con2);
	}else{
		return ovWP\egs\get_dbvaluArray($sql,$con2,$arrType);
	}

}
function sen_dbUp($sql, $newValue, $con) { 
	if(!$con2){
		$con2 = ovWP\wps\get_conn();
		return ovWP\egs\sen_dbUp($sql, $newValue, $con2);
		mysqli_close($con2);
	}else{
		return ovWP\egs\sen_dbUp($sql, $newValue, $con2);
	}

}
function sen_dbUpArray($dbSQLArray, $dbtable, $dbSQLWHEREA, $con2) { 
	if(!$con2){
		$con2 = ovWP\wps\get_conn();
		ovWP\egs\sen_dbUpArray($dbSQLArray, $dbtable, $dbSQLWHEREA, $con2);
		mysqli_close($con2);
	}else{
		ovWP\egs\sen_dbUpArray($dbSQLArray, $dbtable, $dbSQLWHEREA, $con2);
	}

}
function sen_dbDel($dbtable, $dbSQLWHEREA, $con2) { 
	if(!$con2){
		$con2 = ovWP\wps\get_conn();
		return ovWP\egs\sen_dbDel($dbtable, $dbSQLWHEREA, $con2);
		mysqli_close($con2);
	}else{
		return ovWP\egs\sen_dbDel($dbtable, $dbSQLWHEREA, $con2);
	}

}
//***egs***
echo "<br>";
echo ovAPP\dbMySQLi_test("外觀");
echo ovCS\dbMySQLi_test("消耗");
echo ovWP\dbMySQLi_test("武器");
echo "<br>";
echo ovWP\egs\dbMySQLi_test("egs");
echo ovWP\wps\dbMySQLi_test("wps");








//範例
$con = ovWP\wps\get_conn();

/*/***sen_dbINArray***/

// $dbSQLArray = array(
//         "tab3id" => "NULL",
//         "col_INT" => "NULL",
//         "col_VARCHAR" => "NULL",
//         "col_TEXT" => "NULL",
//         "col_DATE" => "NULL",
//         "col_TIME" => "NULL",
//         );
// echo "<br>範例:sen_dbINArray:";
// sen_dbINArray($dbSQLArray,"table 4");
/***sen_dbINArray***/

/*/***get_dbvalu***/
//只會回傳一個值 。 (回傳 多個值 會出現提示)  找一個值

// $sql = "SELECT  gamekey FROM `game`  LIMIT 1";
// echo "<br>範例:get_dbvalu:";
// echo "<br>".get_dbvalu($sql);
/***get_dbvalu***/

/*/***get_dbvaluArray***/
//當arrType = 1的時候(預設) 只會回傳最後一個欄位，所有值 。 (回傳 一個欄位所有值)  找一個欄位所有值
//當arrType = 2的時候       只會回傳最後一筆資料，所有值 。 (回傳 所有欄位值)  找一筆資料所有欄位的值
/*範例一: $arr2[] = get_dbvaluArray($sql,$con,1);  */
/*範例二: $arr2[] = get_dbvaluArray($sql,$con,2);  */

// $sql = "SELECT * FROM `game` limit 4 ";
// echo "<br>範例:get_dbvaluArray:";
// $arr2[] = get_dbvaluArray($sql,$con ,2);
// echo "<br>";
// var_dump($arr2);
// echo "<br>";
/***get_dbvaluArray***/

/*/***sen_dbUp***/
//                                   資料更新 只更新唯一值。


// $sql = "SELECT  gamevalue FROM `game`  where gamekey = 214";
// echo "<br>範例:sen_dbUp:";
// echo "<br>".sen_dbUp($sql,"214");
/***sen_dbUp***/

/*/***sen_dbUpArray***/
//                                   資料多筆更新 多個欄位

// $dbSQLArray = array(
//         "tab3id" => "1",
//         "col_INT" => "2",
//         "col_VARCHAR" => "3",
//         "col_TEXT" => "4",
//         "col_DATE" => "5",
//         "col_TIME" => "6",
//         );
// $dbSQLWHEREA = " WHERE `table 4`.`tab3id` = 52 ";
// echo "<br>範例:sen_dbUpArray:";
// sen_dbUpArray($dbSQLArray,"table 4",$dbSQLWHEREA);
/***sen_dbUpArray***/

/*/***sen_dbDel***/
//範例:sen_dbDel("table 4", " where tab3id = 54; ");

// echo "<br>範例:sen_dbDel:";
// sen_dbDel("table 4", " where tab3id = 54; ");
/***sen_dbDel***/





/*/***SHOW COLUMNS***/
//SHOW COLUMNS FROM `$dbtable`     找資料庫資訊
// echo "<br>範例:SHOW COLUMNS:";
// echo "<br>";
// get_ShowColumns("table 4", $con);
/***sen_dbINArray***/






/*/***sen_dbINArray***/
//echo "<br>範例:sen_dbINArray:";
/***sen_dbINArray***/



mysqli_close($con);


}
?>