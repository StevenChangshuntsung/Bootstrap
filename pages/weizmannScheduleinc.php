<?php
function issePOST($val)
{
    $issePOST = "";
    if(isset($_POST[$val])){
        $issePOST = $_POST[$val];
    }
    return $issePOST;
}
$Speed_type = issePOST("Speed_type");
$Speed_1 = issePOST("Speed_1");
$Speed_2 = issePOST("Speed_2");


function Setspeed($val, $typ)
{
    $Setspeed = $val;
    if ($typ == "Speed_S") {
        $Setspeed += 100;
    }else if ($typ == "Speed_H") {
        $Setspeed -= 100;
    }
    return $Setspeed;
}
if ($Speed_1 != "") {
    $Speed_1 = Setspeed($Speed_1, $Speed_type);
}else{
   $Speed_1 = rand(100, 600);
}
if ($Speed_2 != "") {
    $Speed_2 = Setspeed($Speed_2, $Speed_type);
}else{
   $Speed_2 = $Speed_1 + 100;
}

?>

<?php


// for ($i = 1; $i <= 10; $i++) {
//     echo rand(400, 1000)."\n";
// }

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">weizmannSchedule</h1>
    </div>
</div>
<form id="wsShow" method="post">
    <div class="row">
        <div class="col-lg-12 wsShow">
            Speed_type:
            <input type="text" id="Speed_type" name="Speed_type" value="<?= $Speed_type ?>">
            Speed:
            <input type="text" id="Speed" name="Speed" >

            速度1:
            <input type="text" id="Speed_1" name="Speed_1" value="<?= $Speed_1 ?>">
            速度2:
            <input type="text" id="Speed_2" name="Speed_2" value="<?= $Speed_2 ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            速　度:
            <input class="btn btn-outline btn-default" type="button" id="Speed_H" value="調　快" >
            <input class="btn btn-outline btn-default" type="button" id="Speed_S" value="調　慢" >
        </div>
        <div class="col-lg-12">
            最大值:
            <input type="text" id="maxTr" name="maxTr" value="10">
        </div>
    </div>
</form>

<div class="row">
    <div class="col-lg-12">
        <br>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <div class="col-lg-6">
            <button class="btn btn-outline" id="afresh">重　新</button>
        </div>
        <div class="col-lg-6">
            <button class="btn btn-outline" id="anext">存　檔</button>
        </div>
    </div>
</div>
<br>
<br>
<div class="row" id="divHeight">
    <div class="col-lg-6">
        <button class="btn btn-outline btn-default" id="choose_1">選擇</button>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody id="TrAccordion">
<?php
$max = (21-8)*4;
$i = 1;
do {
?> 
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td><?php echo $i+2; ?></td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
<?php
   $i += 3;
} while ($i <= $max);
?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-6">
        <button class="btn btn-outline btn-default" id="choose_2">選擇</button>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody id="TrAccordion2">

<?php
$i = 1;
do {
?> 
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td><?php echo $i+2; ?></td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
<?php
   $i += 3;
} while ($i <= $max);
?>

            </tbody>
        </table>
    </div>
</div>
<div id="NextPost"></div>