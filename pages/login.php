<?php

// include 'inc/conn/dbMySQLi.php';

//\login.php
//\inc\conn\dbMySQLi.php

$HTMLlang = "en";
$formname = "formlogin";

$member_E = $_POST["email"];
$member_P = $_POST["password"];

if($member_E<>"" and $member_P <>""){
echo "123";
}



?>


<?php ?>
<!DOCTYPE html>
<html lang="<?php echo $HTMLlang; ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" name="<?php echo $formname; ?>" id="<?php echo $formname; ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form index.php-->
                                <a class="btn btn-lg btn-success btn-block" onClick ="goLogin();">Login</a>
                                <!-- <a href="">123<?php //echo $_POST["email"];?></a>
                                <a href="">456<?php //echo $_POST["password"];?></a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
    function goLogin(){
        document.<?php echo $formname; ?>.action="login.php";
        document.<?php echo $formname; ?>.submit();

        //C:\Bitnami\wampstack-5.5.30-0\apache2\htdocs\startbootstrap-sb-admin-2-1.0.8\pages\login.php
    }
    function LoginSession() {
        //alert(document.getElementsByClassName("form-control")[1].value);
        //sessionStorage.lastname = document.getElementById("password").value
        // sessionStorage.lastname = document.getElementsByClassName("form-control")[1].value
        // var dt = new Date();
        // var time = dt.getHours() +"."+ dt.getMinutes()
        // alert(time);
    }
    </script>


</body>

</html>
