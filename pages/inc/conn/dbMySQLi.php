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
echo "<br>";
echo ovAPP\dbMySQLi_test("外觀");
echo ovCS\dbMySQLi_test("消耗");
echo ovWP\dbMySQLi_test("武器");
echo "<br>";
echo ovWP\egs\dbMySQLi_test("egs");
echo ovWP\wps\dbMySQLi_test("wps");








//範例
// $con = ovWP\wps\get_conn();

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
//

$sql = "SELECT  gamevalue FROM `game`  where gamekey = 214";
echo "<br>範例:sen_dbUp:";
echo "<br>".sen_dbUp($sql,"214");
/***sen_dbUp***/










/*/***sen_dbINArray***/
//echo "<br>範例:sen_dbINArray:";
/***sen_dbINArray***/



// mysqli_close($con);


}
?>