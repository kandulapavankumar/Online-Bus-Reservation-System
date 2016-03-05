<?php
/**
 * Created by PhpStorm.
 * User: saikd
 * Date: 12/5/2015
 * Time: 5:04 PM
 */
?>
<html xmlns="http://www.w3.org/1999/html">
<head><title>FeedBack</title>
    <link rel="stylesheet" href="style/table.css"/>
    <!--<style>
        a{background-color:#3399FF; cursor:default; border-style:groove; color:#FFFFFF; text-decoration:blink; font-family:Verdana; font-weight:bold;}
    </style>-->
    <?php
    require("config.php");

    ?>
</head>
<body  style="background-color: #5F87B1;">
<div align="center">

    <img src="http://electricvehicle.ieee.org/files/2012/04/BYD-eBUS-121.jpg" width="807" height="150"/>
</div>
<form action="" method="post">


    <table width="807px" style="margin: auto;">
        <!--<tr><td colspan="3" height="140"><img width="800" height="140" src="images/Banner.jpg" /></td></tr>-->
        <tr>
            <td colspan="3" bgcolor="#330000" align="center" height="5px" width="100%">
                <h1 style="text-align:center; color:#FFFFFF; font-size:22px; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

                    Welcome To Online Bus-Ticket Reservation</h1></td>
        </tr>

        <tr></tr>
        <tr></tr>
        <tr align="center" style="background-color: #FFFFCC;">
            <td colspan="3" align="center" height="5px"><h2 align="center">Feedback Form</h2></td>
        </tr>
    </table>
    <table cellspacing="20" style="margin: auto;width: 807px;background-color: #FFFFCC;">
        <tr>
            <td>Name: <input type="text" name="name" size="20"/></td>

        </tr>
        <tr>
            <td>Email: <input type="text" name="email" size="20"/></td>
        </tr>
        <tr>
            <td><span>General Comments:</span>
            <textarea name="comments" rows="6" cols="30"></textarea></td>
        </tr>
        <tr>
            <td >

                <button type="submit" value="Back" name="back"/>
                <a href="Home.php?" style="text-decoration: none; color: black;"> Back
                    </button>
                </a>

            <input type="submit" value="Submit Feedback" name="submit_feedback"/></td>
        </tr>
    </table>
</form>
<?php
if (isset($_POST['submit_feedback'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];

    $sql = mysql_query("insert into feedback VALUES ('$name','$comments','$email')");

    echo $sql;
    if ($sql > 0) {
        echo "<script type='text/javascript'>alert('Feedback Submitted Successfully');
                                        window.location.href='Home.php?';
                </script>";


    } else {
        echo "<script type='text/javascript'>alert('Feedback Not Submitted');</script>";
    }
    // header("Location:Home.php?");
}
?>

</body>
</html>