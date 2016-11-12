<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- 
This is a skeleton html file that you can use to get you started on each new 
HTML project

Name: Your Name Here
Class: CIS 3303
Section: x
-->



<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/mvc/public/css/main.css">

    </head>



    <body class='email-page'>


        <?php

        require_once 'db_creds.php';




        $name = $_POST['name'];
        $drug = $_POST['drug'];
        $mnemonic = $_POST['mnemonic'];
        $from = 'From: Monikos'; 
        $to = 'nikkig2223@gmail.com'; 
        $subject = 'New Mnemonic Suggestion';

        $body = "From: $name\n Message:\n $mnemonic Drug: $drug";

        if ($_POST['submit']) {				 
            if (mail ($to, $subject, $body, $from)) { 

                echo '<p>Your suggestion has been sent!</p>';

                $sql = "UPDATE Users SET capsules = capsules + 200 WHERE id= '" .$_COOKIE['user_id'] ."'";

            } else { 
                echo '<p>Something went wrong, go back and try again!</p>'; 
            } 
        }

        if ($conn->query($sql) === TRUE) {
        } else {
            echo '[{"response":"'.$conn->error.'"}]';
        }


        $conn->close();
        echo($result);

        ?>

        <a class=back-btn href=../mvc/public/home/drugDatabase>Back</a>

    </body>

</html>