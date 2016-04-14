<?php
/*information operating Incorrect */
function msg_mysqli_query($con) {
	if(!$con){
		echo "<br>mysqli_query: 無資料庫連結 ";
	}elseif(!mysqli_errno($con)){
		echo "<br>mysqli_query: 成功 ";
	}else{
	    echo "<br>錯誤代碼: ".mysqli_errno($con)."<br>錯誤描述:".mysqli_error($con);
		echo "<br>SQLSTATE錯誤代碼: ".mysqli_sqlstate($con);
		    //print_r(mysqli_error_list($con)); /*前三項錯誤組成ARRAY */
	    }
}

function msg_onemoreseek($sql) {
	$outputERROR = "error: MAX one row in seek"."<br>";
	$outputERROR .= $sql;
	$outputERROR .= "<br>: errorEND";
	return $outputERROR;
}

function msg_noSeekRow($i) {
	$outputERROR = "error: Cannot seek to row ".$i."<br>";
	$outputERROR .= "<br>: errorEND";
	return $outputERROR;
}




?>