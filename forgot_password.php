<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>:: Online Bus-Ticket Reservation :: Change Password</title>
<body style="background-color: #5F87B1;">
<h1>
    <?php

    session_start();
    if (isset($_GET['email'])) {
        require("config.php");
        $email = $_GET['email'];

        $sql = mysql_query("select * from register where email = '$email'");
        if (mysql_num_rows($sql) > 0) {
            $r = mysql_fetch_array($sql);
            $id = $r['id'];


            $length = 10;
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $count = mb_strlen($chars);

            for ($i = 0, $result = ''; $i < $length; $i++) {
                $index = rand(0, $count - 1);
                $result .= mb_substr($chars, $index, 1);
            }
            $pass = $result;

            $sql = mysql_query("update register set password='$pass' where id='$id'") or die(mysql_error());


            $subject = 'Password Change Request';
            //$message = 'Hello User,\n\n Your ticket has been booked from '."$from".'.';
            $message = 'You requested a change of password. Your new password is: ' . "$pass" . '';
            $headers = 'From: admin@noreply.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($email, $subject, $message, $headers);

            echo 'Your new password has been sent to your email id.';
        } else {
            echo 'The email was not found in Database.';
        }


    } else {
        echo 'Email id not found';
    }
    ?>

</h1>
</body>
</html>
