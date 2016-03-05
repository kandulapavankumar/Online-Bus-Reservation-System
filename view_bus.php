<?php
session_start();
if(isset($_SESSION['id']))
{
require("config.php");
$uid = $_SESSION['id'];

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>:: Online Bus-Ticket Reservation ::</title>
    <link rel="stylesheet" href="style/table.css"/>
    <style>
        a {
            cursor: default;
        }
    </style>


</head>

<body topmargin="0" bottommargin="0" bgcolor="#CCCC99" style="background-color: #5F87B1;">
<table bgcolor="#FFCCFF" style="margin-top:0" align="center" width="800px" border="1" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="2" align="center" width="800px" height="140px">
            <img src="http://electricvehicle.ieee.org/files/2012/04/BYD-eBUS-121.jpg" width="807" height="150"/>
        </td>
    </tr>
    <tr>
        <td colspan="2" bgcolor="#330000" align="center" height="5px">
            <h2 style="text-align:center; color:#FFFFFF; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

                Welcome To Online Bus-Ticket Reservation</h2></td>
    </tr>

</table>


<?php

$query = mysql_query("select * from bus");


if (mysql_num_rows($query) > 0) {

    ?>
    <table border="1" style="background-color: #FFFFCC;" bordercolor="#000000" width="811" height="62" align="center" cellpadding="1" class="table">

        <tr align="center">
            <td width="115">Bus Name</td>
            <td width="122">From</td>
            <td width="117">To</td>
            <td width="117">Date</td>
            <td width="117">Departure Time</td>
            <td width="117">Arrival Time</td>
            <td width="110">Distance</td>
            <td width="110">Fare</td>
        </tr>
        <?php
        while ($r = mysql_fetch_array($query)) {
            $bus_name = $r['bus_name'];
            $from_stop = $r['from_stop'];
            $to_stop = $r['to_stop'];
            $journey_date = $r['date'];
            $distance = $r['distance'];
            $fare = $r['fare'];
            ?>
            <tr align="center">
                <td width="115"><?php echo $bus_name; ?></td>
                <td><?php echo $from_stop; ?></td>
                <td><?php echo $to_stop; ?></td>
                <td><?php echo $r['date']; ?></td>
                <td><?php echo $r['dept_time']; ?></td>
                <td><?php echo $r['arrival_time']; ?></td>
                <td><?php echo $distance; ?></td>
                <td><?php echo $fare; ?></td>
            </tr>
        <?php
        }?>
    </table>
<?php
} else {
    ?>
    <script>
        alert("You dont have any buses");
        window.location = "AdminHome.php?id=<?php echo $uid; ?>";
    </script>
    <!--    <h2 style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif">You Dont Have any Booking History</h2>
    -->    <?php
}
?>
<div style="width: 800px;margin: auto; margin-top: 15px;">

    <a style="color: #000000;font-weight: bold" href="AdminHome.php?id=<?php echo $uid; ?>">Back to Home</a>
</div>

<script>
    function clk() {
        var cancel = confirm("Are You Sure You Want to Cancel the Ticket");
        if (cancel == true) {
            window.location = "cancel.php?id=<?php echo $uid; ?>&seat_id=<?php echo $seat_no_booked; ?>&bus_id=<?php echo $bus_id; ?>&did=<?php echo $id;?>";
        }

    }

</script>
<?php
}
else {
    header("Location:Home.php?id=$uid");
}
?>
</body>
</html>

