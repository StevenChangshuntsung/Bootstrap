<?php
include 'C:\htdocs\Bootstrap\pages\inc\conn\conInv\conInvO\conInvO.php';
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

