<?php  
namespace dbMySQLi\ovWP\egs { 
include '../../iOpIn/iOpIn.php'; 
	/*egs*/
	function dbMySQLi_test($StrAll) { 
		return $StrAll;
	} 

	function sen_dbDel($dbtable, $dbSQLWHEREA, $con2) { 
		global $dbSource;
		$sql = "DELETE FROM `".$dbSource["dbname"]."`.`$dbtable`  $dbSQLWHEREA  ";
		// echo $sql ;
		test_mysqli_query($con2, $sql);
	} 

	function sen_dbUp($sql, $newValue, $con) { 
		$result=mysqli_query($con,$sql);
		if (!$rowcount=mysqli_num_rows($result)){
	            return "null";
	        }
	    $fieldinfo=mysqli_fetch_fields($result);
	            $StrAll = "";
	            for($i = 0;$i< $rowcount;$i++ ){
	                if (!mysqli_data_seek ($result, $i)) { return msg_noSeekRow($i); continue;}
	                if (1 < $rowcount) { return msg_onemoreseek($sql);}/*資料筆數*/
	                if (1 < count($fieldinfo)) { return msg_onemoreseek($sql);}/*欄位數量*/
	                if(!($row = mysqli_fetch_array ($result))) {continue;}
	                $StrAll = $row[0];
	            }

	            foreach ($fieldinfo as $val){
	            	$wSQL = stristr($sql,"`".$val->table."`");
	            	$wSQL = str_replace("`".$val->table."`","",$wSQL);

	            	$sql = "UPDATE `".$val->db."`.`".$val->table."` ";
	            	$sql .= " SET `".$val->name."` = '".$newValue."' ";

	            	$sql .= $wSQL;

	            	// return $sql;/*放開return 就不會執行下面程式*/
	            	test_mysqli_query($con, $sql);
	            }
		
	} 

	
	function sen_dbUpArray($dbSQLArray, $dbtable, $dbSQLWHEREA, $con2) { 
		$dbcol="";$dbval="";
		global $dbSource;
		foreach ($dbSQLArray as $key => $val) {
			$dbval .= "`$key` = '$val', ";
		}
		foreach ($dbSQLWHEREArray as $key => $val) {
			$sqlwhere .= "`$key` = '$val', ";
		}
		$sql = "UPDATE `".$dbSource["dbname"]."`.`".$dbtable."` "." SET ";
		$sql .= trim($dbval, ", ");
		$sql .= $dbSQLWHEREA;
		// $sql .= " WHERE `table 4`.`tab3id` = 1 ";
		echo $sql;
		test_mysqli_query($con2, $sql);
	}

//UPDATE `test`.`table 4` SET `col_INT` = '0', `col_VARCHAR` = '0', `col_TEXT` = '0' WHERE `table 4`.`tab3id` = 1;


	function sen_dbIN($dbSQLArray, $dbtable, $con2) { 
/*只新增一個值 意味其他欄位的值 都是NULL*/
	}

	function sen_dbINArray($dbSQLArray, $dbtable, $con2) { 
		$dbcol="";$dbval="";
		global $dbSource;
		foreach ($dbSQLArray as $key => $val) {
			$dbcol .= "`$key`, ";
			$dbval .= "$val, ";
		}
		$sql = "INSERT INTO `".$dbSource["dbname"]."`.`".$dbtable."` (".trim($dbcol, ", ").") VALUES (".trim($dbval, ", ").");";

		test_mysqli_query($con2, $sql);
	}

	function get_dbvalu($sql, $con) { 
		$result=mysqli_query($con,$sql);
		if (!$rowcount=mysqli_num_rows($result)){
	            return "null";
	        }
	    $fieldinfo=mysqli_fetch_fields($result);
	            $StrAll = "";
	            for($i = 0;$i< $rowcount;$i++ ){
	                if (!mysqli_data_seek ($result, $i)) { return msg_noSeekRow($i); continue;}
	                if (1 < $rowcount) { return msg_onemoreseek($sql);}/*資料筆數*/
	                if (1 < count($fieldinfo)) { return msg_onemoreseek($sql);}/*欄位數量*/
	                if(!($row = mysqli_fetch_array ($result))) {continue;}
	                $StrAll = $row[0];
	            }
		return $StrAll;
	} 

	function get_dbvaluArray($sql,$con,$arrType) { 
		$result=mysqli_query($con,$sql);
		if (!$rowcount=mysqli_num_rows($result)){
	            return "null";
	        }
	    $arr2[] = $rowcount;

	            $StrAll = "";

	            $fieldinfo=mysqli_fetch_fields($result);
	            for($i = 0;$i< $rowcount;$i++ ){
	                if (!mysqli_data_seek ($result, $i)) { printf ("Cannot seek to row %d\n", $i); continue;}
	                if(!($row = mysqli_fetch_array ($result))) {continue;}
	                    	// var_dump($row);
	                    foreach ($fieldinfo as $val){
	                        // $arr2[$i] = $row[$val->name];
	                        // $arr2[$val->name] = $row[$val->name];
	                        switch ($arrType)
							{
							case 1:
							  $arr2[$i] = $row[$val->name];
							  break;
							case 2:
							  $arr2[$val->name] = $row[$val->name];
							  break;
							default:
							  $arr2[$i] = $row[$val->name];
							}
	                    }

	            }
		return $arr2;
	} 



	function test_mysqli_query($con,$sql) {
    	mysqli_query($con,$sql);
    	msg_mysqli_query($con);
    } 

}
?>