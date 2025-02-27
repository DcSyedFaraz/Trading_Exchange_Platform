<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];

    $to = array('wolappen@yahoo.com');
    $subject = "Contact Info";

    $message = '<center><h1>CONTACT INFO</h1></center>
    <table width="800" height="247" align="center">
       	<tr>
           	<td>Name :- </td>
            <td>' . $name . '</td>
        </tr>
		<tr>
           	<td>Email :- </td>
            <td>' . $email . '</td>
        </tr>
		<tr>
           	<td>Phone :- </td>
            <td>' . $phone . '</td>
        </tr>
		<tr>
           	<td>msg :- </td>
            <td>' . $msg . '</td>
        </tr>
</table>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Trader`s Exchange <no-reply@tradersexchange.org>' . "\r\n";
    if (mail(implode(',', $to), $subject, $message, $headers)) {

?>
        <script>
            alert('Form Submitted Successfully');
            window.location = "https://tradersexchange.org/";
        </script>
    <?php

    } else {
    ?>
        <script>
            alert('An Error Occured While Sending Email.. Please try Again');
        </script>
    <?php
    }
    ?>

<?php
}
?>
