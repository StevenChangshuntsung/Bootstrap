<?php
include dirname(__file__).'/conInvO/conInvO.php';
/**
 * conn
 */
trait connInv
{
    use connection, connection_close;
    use sql_query { 
            errMsg_query as public test_query; 
        }

}

