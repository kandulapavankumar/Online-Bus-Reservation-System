<?php
session_start();
if (isset($_SESSION['id']))
{
?>
<html>
<head><title>:: Profile ::</title>
    <link rel="stylesheet" href="style/table.css"/>
    <style>
        a {
            background-color: #3399FF;
            cursor: default;
            border-style: groove;
            color: #FFFFFF;
            text-decoration: blink;
            font-family: Verdana;
            font-weight: bold;
        }
    </style>
    <?php

    require("config.php");
    $uid = $_SESSION['id'];
    $sql = mysql_query("select * from register where id = '$uid'");
    $r = mysql_fetch_array($sql);

    $name = $r['name'];
    $dob = $r['dob'];
    $adress = $r['address'];
    $mobile = $r['mobile'];
    $pincode = $r['pin_code'];
    $gender = $r['gender'];
    $email = $r['email'];
    $password = $r['password'];
    ?>
</head>
<body topmargin="0" style="background-color: #5F87B1;">
<form>
    <table class="table" align="center" width="800" cellpadding="0" cellspacing="0" style="background-color: #FFFFCC;">
        <tr>
            <td colspan="3" height="140">
                <img src="http://electricvehicle.ieee.org/files/2012/04/BYD-eBUS-121.jpg" width="807" height="150"/>
            </td>
        </tr>
        <tr>
            <td colspan="3" bgcolor="#330000" align="center" height="5px">
                <h1 style="text-align:center; color:#FFFFFF; font-size:22px; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

                    Welcome To Online Bus-Ticket Reservation</h1></td>
        </tr>

        <tr>
            <td width="93">
                Name:
            </td>
            <td width="307"><input style="border:0px;width:300;background-color: #FFFFCC;" type="text" value="<?php echo $name; ?>"
                                   readonly="readonly"></td>
        </tr>
        <tr>
            <td>
                Address:
            </td>
            <td><input style="border:0; width:300;background-color: #FFFFCC;" type="text" value="<?php echo $adress; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>
                Pin code:
            </td>
            <td><input style="border:0; width:300;background-color: #FFFFCC;" type="text" value="<?php echo $pincode; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>
                DOB:
            </td>
            <td><input style="border:0; width:300;background-color: #FFFFCC;" type="text" value="<?php echo $dob; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>
                Gender:
            </td>
            <td><input style="border:0; width:300;background-color: #FFFFCC;" type="text" value="<?php echo $gender; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>
                Mobile No:
            </td>
            <td><input style="border:0; width:300;background-color: #FFFFCC;" type="text" value="<?php echo $mobile; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td><input style="border:0; width:300;background-color: #FFFFCC;" type="text" value="<?php echo $email; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td><input style="border:0; width:300;background-color: #FFFFCC;" type="text" value="<?php echo $password; ?>" readonly="readonly">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3" style="padding-right:435">
                <a href="profile-update.php?id=<?php echo $uid; ?>">EDIT</a>
                <?php
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
                    ?> <a href="AdminHome.php?id=<?php echo $uid; ?>">Back</a> <?php
                } else {
                    ?> <a href="Home.php?id=<?php echo $uid; ?>">Back</a> <?php
                }
                ?>
            </td>
        </tr>
    </table>
</form>
<?php
}
else {
    header("Location:Home.php?id=$uid");
}
?>

</body>
</html>