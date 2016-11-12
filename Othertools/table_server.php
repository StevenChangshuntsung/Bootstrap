<? 
namespace blank;
?>
<?php include("../blank/blank_head.php"); ?>
<html lang="en">
<head>
    <title>_SERVER 訊息</title>
</head>
<body>
    <div id="wrapper">
        <?php include("../topbar/navigation.php"); /*Navigation 導航BAR*/?>
<?php 
function GetBasePath() { 
    return substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_FILENAME']) - strlen(strrchr($_SERVER['SCRIPT_FILENAME'], "\\"))); 
} 
 ?>


        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">_SERVER 訊息</h1>
                        SCRIPT_FILENAME:<br><?php echo GetBasePath(); ?>

                    </div>
                    <div class="col-lg-12">
                        <br><br><br><br>
                        <a href="http://php.net/manual/zh/function.phpinfo.php">phpinfo(32); </a>
                        <br>
                        <?php phpinfo(32); ?>
                    </div>

                </div>
            </div>
        </div>




    </div>
<?php include("../blank/blank_footer.php"); ?>
</body>
</html>

