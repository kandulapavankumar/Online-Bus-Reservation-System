<?php
session_start();
if (isset($_SESSION['id']))
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <style>
        a {
            cursor: default;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="style/table.css"/>
    <style>
        a {
            background-color: #990000;
            text-align: center;
            text-decoration: none;
            font-family: Verdana, Geneva, sans-serif;
            color: #FFF;
            border: double;
            font-weight: 700;
            padding-bottom: 30;
            width: 50px;
            vertical-align: central;
        }
    </style>
    <title>:: Add Bus ::</title>
</head>

<body topmargin="0" bottommargin="0" bgcolor="#CCCC99"  style="background-color: #5F87B1;">
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

    <tr>
        <td align="center" height="300">

            <table width="530" height="180" align="center" cellpadding="0" cellspacing="0" class="table">
                <tr>
                    <td height="50" align="center" bgcolor="#FFFFFF" style="font-family:Verdana, Geneva, sans-serif">
                        <form method="post">
                            <dd><br/>
                                Bus Name:<font color=#FF0000>*</font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input required type="text"
                                                                                       name="bus_name" value=""/></dd>

                            <dd><br/>
                                From Stop:<font color=#FF0000>*</font>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                require("config.php");
                                $bus_stops_query = mysql_query("select * from bus_stops");
                                ?>
                                <select
                                    style="background-color:; font-style:oblique; font-family:Verdana; font-weight:bold"
                                    name="from_stop">
                                    <option value="0" selected="selected">-Select-</option>
                                    <?php
                                    while ($bs = mysql_fetch_array($bus_stops_query)) {
                                        echo '<option value="' . $bs['bus_stops'] . '">' . $bs['bus_stops'] . '</option>';
                                    }
                                    ?>
                                </select>
                            <dd><br/>
                                To Stop:<font color=#FF0000>*</font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                $bus_stops_query = mysql_query("select * from bus_stops");
                                ?>
                                <select
                                    style="background-color:; font-style:oblique; font-family:Verdana; font-weight:bold"
                                    name="to_stop">
                                    <option value="0" selected="selected">-Select-</option>
                                    <?php
                                    while ($bs = mysql_fetch_array($bus_stops_query)) {
                                        echo '<option value="' . $bs['bus_stops'] . '">' . $bs['bus_stops'] . '</option>';
                                    }
                                    ?>
                                </select>


                            </dd>
                            <dd><br/>
                                Date:<font color=#FF0000>*</font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                    required placeholder="YYYY-MM-DD" type="text" name="date" value=""/></dd>
                            <dd><br/>
                                Departure Time:<font color=#FF0000>*</font>
                                <input required type="text" placeholder="HH:MM" name="departure_time" value=""/></dd>
                            <dd><br/>
                                Arrival Time:<font color=#FF0000>*</font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input required placeholder="HH:MM" type="text"
                                                                     name="arrival_time" value=""/></dd>
                            <dd><br/>
                                Distance:<font color=#FF0000>*</font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input required type="text"
                                                                                                   name="distance"
                                                                                                   value=""/></dd>
                            <dd><br/>
                                Fare:<font color=#FF0000>*</font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                    required type="text" name="fare" value=""/></dd>
                            <dd><br/>
                                Window Seat numbers:<font color=#FF0000>*</font>
                                <input required type="text" name="window_s" placeholder="1,2,3,4,5" value=""/></dd>
                            <dd><br/>
                                N-Window Seat Numbers:<font color=#FF0000>*</font>
                                <input required type="text" name="n_window_s" placeholder="1,2,3,4,5" value=""/></dd>
                            <br/>


                            <?php
                            require("config.php");

                            $uid = $_SESSION['id'];

                            $sql = mysql_query("select * from register where id = '$uid'");
                            $r = mysql_fetch_array($sql);
                            $password = $r['password'];

                            if (isset($_POST['s'])) {
                                $bus_name = $_POST['bus_name'];
                                $from_stop = $_POST['from_stop'];
                                $to_stop = $_POST['to_stop'];
                                $date = $_POST['date'];
                                $dep_time = $_POST['departure_time'];
                                $ari_time = $_POST['arrival_time'];
                                $distance = $_POST['distance'];
                                $fare = $_POST['fare'];
                                $window_s = $_POST['window_s'];
                                $n_window_s = $_POST['n_window_s'];

                                $a = "insert into bus(id, bus_name, from_stop, to_stop, date, dept_time, arrival_time, distance, fare)values(NULL, '" . $bus_name . "','" . $from_stop . "','" . $to_stop . "','" . $date . "','" . $dep_time . "','" . $ari_time . "','" . $distance . "','" . $fare . "')";
                                $sql = mysql_query($a);
                                $id = mysql_insert_id();
                                $insertsql = "CREATE TABLE IF NOT EXISTS `" . $id . "bus` ( `id` int(11) NOT NULL AUTO_INCREMENT, `status` varchar(120) NOT NULL, `state` varchar(120) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ";
                                $sql = mysql_query($insertsql);

                                $recordinsertsql = "INSERT INTO `" . $id . "bus` (`id`, `status`, `state`) VALUES ";
                                $records = '';
                                $window_seat_array = explode(',', $window_s);
                                foreach ($window_seat_array as $seat_no) {
                                    if ($records == '') {
                                        $records = "(" . $seat_no . ", 'Available', 'W')";
                                    } else {
                                        $records = $records . ", (" . $seat_no . ", 'Available', 'W')";
                                    }
                                }

                                $non_window_seat_array = explode(',', $n_window_s);
                                foreach ($non_window_seat_array as $seat_no) {
                                    if ($records == '') {
                                        $records = "(" . $seat_no . ", 'Available', 'N')";
                                    } else {
                                        $records = $records . ", (" . $seat_no . ", 'Available', 'N')";
                                    }
                                }
                                $recordinsertsql = $recordinsertsql . $records;
                                $sql = mysql_query($recordinsertsql);

                                ?>
                                <script>
                                    alert('Bus Added Successfully');
                                    window.location = 'AdminHome.php?id=<?php echo $uid; ?>';
                                </script>
                            <?php

                            }
                            ?>
                            <hr/>
                            <input
                                style="background-color:#990000; color:#FFFFFF; font-family:Verdana; font-weight:700; border-style:double"
                                type="submit" name="s" value="SUBMIT"/>
                            <?php
                            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
                                ?> <a style="border:0px;" href="AdminHome.php?id=<?php echo $uid; ?>"> &nbsp;
                                    Back&nbsp; </a> <?php
                            } else {
                                ?> <a style="border:0px;" href="Home.php?id=<?php echo $uid; ?>"> &nbsp;
                                    Back&nbsp; </a> <?php
                            }
                            ?>


                        </form>
            </table>
        </td>
    </tr>
</table>

<?php
}
else {
    header("Location:Home.php?id=$uid");
}
?>
