<?php
/**
 * connection 
 * 連接資料庫
 */
trait connection
{
    //======屬性
    public $conn_dbSource = array(
        "host" => "127.0.0.1",
        "username" => "cst",
        "password" => "123456",
        "dbname" => "dbcst",
        "port" => "3306",
        "socket" => "",
        );

    //======方法
    public function conn() {
        $conn_dbSource = $this->conn_dbSource;
        $con=mysqli_connect($conn_dbSource["host"],$conn_dbSource["username"],$conn_dbSource["password"],$conn_dbSource["dbname"],$conn_dbSource["port"]);

        if (mysqli_connect_errno($con))
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            mysqli_close($con);
        }else{
            echo "<br>MySQL 有連結到。<br>";
            return $con;
        }
    }
}
/**
 * 執行 SQL Query
 */
trait sql_query
{
    public function errMsg_query($con,$sql) {
        /*function 打包程式 執行mysqli_query  有提示錯誤 */
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
    private function query($con,$sql) {
        /*設私有  可以限制存取 
        Fatal error: Uncaught Error: Call to private method...*/
        mysqli_query($con,$sql);
    } 
}
/**
 * connection_close
 */
trait connection_close
{
    public function close($con){
        mysqli_close($con);
    }
    public function tesst()
    {
        echo "tesst";
    }
}


/**
 * conn
 */
trait conn
{
    use connection, connection_close;
    use sql_query { 
            errMsg_query as public test_query; 
        }

}

/**
* 
*/
class conInv 
{
    use conn;
    
}


?>


<?php 
    echo(memory_get_usage(true).'<br>');
    echo '<br>';
    $a = new conInv();
    $a->tesst();


    $con = $a->conn();

    echo(memory_get_usage().'<br>');

    $sql = "INSERT INTO"." `ccode` ( `Enab`, `group1`) VALUES ( '1', '01' )";

    $a::test_query($con,$sql);

    $a->close($con);



?>