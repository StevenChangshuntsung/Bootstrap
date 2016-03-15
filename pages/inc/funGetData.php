<?php  
namespace funGetData { 
$dbSource = array(
	    "host" => "127.0.0.1",
	    "username" => "root",
	    "password" => "qwe123",
	    "dbname" => "test",
	    "port" => "3306",
	    "socket" => "",
		);
function get_conn() { 
	global $dbSource;
	$con=mysqli_connect($dbSource["host"],$dbSource["username"],$dbSource["password"],$dbSource["dbname"],$dbSource["port"]);
	    if (mysqli_connect_errno($con))
	    {
	    	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    	mysqli_close($con);
	    }else{
	        //echo "<br>MySQL 有連結到。<br>";
	        mysqli_close($con);
	        return mysqli_connect($dbSource["host"],$dbSource["username"],$dbSource["password"],$dbSource["dbname"],$dbSource["port"]);
		}
	    
}  
/*
$con = get_conn();
mysqli_close($con);
*/

function sen_dbDel($dbSQLArray, $dbtable, $con2) { 

}


function sen_dbUp($dbSQLArray, $dbtable, $con2) { 

}
function sen_dbUpArray($dbSQLArray, $dbtable, $con2) { 

}




function sen_dbIN($dbSQLArray, $dbtable, $con2) { 

}

function sen_dbINArray($dbSQLArray, $dbtable, $con2) { 
	$dbcol="";$dbval="";
	global $dbSource;
	foreach ($dbSQLArray as $key => $val) {
		$dbcol .= "`$key`, ";
		$dbval .= "$val, ";
	}
	$sql = "INSERT INTO `".$dbSource["dbname"]."`.`".$dbtable."` (".trim($dbcol, ", ").") VALUES (".trim($dbval, ", ").");";
	if(!$con2){
		$con1 = get_conn();
		test_mysqli_query($con1, $sql);
		mysqli_close($con1);
	}else{
		test_mysqli_query($con2, $sql);
	}
	

}

function get_dbvalu($con,$sql) { 
	$result=mysqli_query($con,$sql);
	if (!$rowcount=mysqli_num_rows($result)){
            return "null";
        }
            $StrAll = "";

            $fieldinfo=mysqli_fetch_fields($result);
            for($i = 0;$i< $rowcount;$i++ ){
                if (!mysqli_data_seek ($result, $i)) { printf ("Cannot seek to row %d\n", $i); continue;}
                if(!($row = mysqli_fetch_array ($result))) {continue;}
                    foreach ($fieldinfo as $val){
                        $StrAll = $row[$val->name];
                    }

            }
	return $StrAll;
} 

function get_dbvaluArray($con,$sql) { 
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
                    foreach ($fieldinfo as $val){
                        $arr2[$i] = $row[$val->name];
                    }

            }
	return $arr2;
} 



function test_mysqli_query($con,$sql) {
    	mysqli_query($con,$sql);
    	if (!mysqli_errno($con))
	    {echo "<br>mysqli_query: 成功 ";}else{
	    	echo "<br>錯誤代碼: ".mysqli_errno($con)."<br>錯誤描述:".mysqli_error($con);
		    echo "<br>SQLSTATE錯誤代碼: ".mysqli_sqlstate($con);
		    //print_r(mysqli_error_list($con)); /*前三項錯誤組成ARRAY */
	    }
    } 

}


// get_conn() 

// sen_dbDel($dbSQLArray, $dbtable, $con2) 

// sen_dbUp($dbSQLArray, $dbtable, $con2) 
// sen_dbUpArray($dbSQLArray, $dbtable, $con2) 

// sen_dbIN($dbSQLArray, $dbtable, $con2) 
// sen_dbINArray($dbSQLArray, $dbtable, $con2) 

// get_dbvalu($con,$sql) 
// get_dbvaluArray($con,$sql) 

// test_mysqli_query($con,$sql)
?>