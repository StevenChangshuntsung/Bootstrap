<? 
namespace blank;
?>
<?php include("../blank/blank_head.php"); ?>
<html lang="en">
<head>
    <title>GetServer</title>
</head>
<body>
    <div id="wrapper">
        <?php include("../topbar/navigation.php"); /*Navigation 導航BAR*/?>



        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<?php  echo $_SERVER["HTTP_CLIENT_IP"];?>
						<?php  echo $_SERVER["HTTP_X_FORWARDED_FOR"];?>
						<?php  echo $_SERVER["HTTP_X_FORWARDED"];?>
						<?php  echo $_SERVER["HTTP_X_CLUSTER_CLIENT_IP"];?>
						<?php  echo $_SERVER["HTTP_FORWARDED_FOR"];?>
						<?php  echo $_SERVER["HTTP_FORWARDED"];?>
						<?php  echo $_SERVER["REMOTE_ADDR"];?>
						<?php  echo $_SERVER["HTTP_VIA"];?>
						<?php
						if(!empty($_SERVER['HTTP_CLIENT_IP'])){
						   $myip = $_SERVER['HTTP_CLIENT_IP'];
						}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
						   $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
						}else{
						   $myip= $_SERVER['REMOTE_ADDR'];
						}
						echo $myip;
						?>
                	</div>
                	<div class="col-lg-12">
						<br>
                	</div>
                    <div class="col-lg-12">
                        <h1 class="page-header">GetServer</h1>
<?php 	
$indicesServer = array('PHP_SELF', 
'argv', 
'argc', 
'GATEWAY_INTERFACE', 
'SERVER_ADDR', 
'SERVER_NAME', 
'SERVER_SOFTWARE', 
'SERVER_PROTOCOL', 
'REQUEST_METHOD', 
'REQUEST_TIME', 
'REQUEST_TIME_FLOAT', 
'QUERY_STRING', 
'DOCUMENT_ROOT', 
'HTTP_ACCEPT', 
'HTTP_ACCEPT_CHARSET', 
'HTTP_ACCEPT_ENCODING', 
'HTTP_ACCEPT_LANGUAGE', 
'HTTP_CONNECTION', 
'HTTP_HOST', 
'HTTP_REFERER', 
'HTTP_USER_AGENT', 
'HTTPS', 
'REMOTE_ADDR', 
'REMOTE_HOST', 
'REMOTE_PORT', 
'REMOTE_USER', 
'REDIRECT_REMOTE_USER', 
'SCRIPT_FILENAME', 
'SERVER_ADMIN', 
'SERVER_PORT', 
'SERVER_SIGNATURE', 
'PATH_TRANSLATED', 
'SCRIPT_NAME', 
'REQUEST_URI', 
'PHP_AUTH_DIGEST', 
'PHP_AUTH_USER', 
'PHP_AUTH_PW', 
'AUTH_TYPE', 
'PATH_INFO', 
'ORIG_PATH_INFO') ;  ?>

<?php 	
echo '<table cellpadding="10">' ; 
foreach ($indicesServer as $arg) { 
    if (isset($_SERVER[$arg])) { 
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ; 
    } 
    else { 
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ; 
    } 
} 
echo '</table>' ; 
 ?>
                    </div>
                </div>
            </div>
        </div>




    </div>
<?php include("../blank/blank_footer.php"); ?>
</body>
</html>
