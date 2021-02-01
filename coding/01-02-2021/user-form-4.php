<?php

$name = $email = $subject = $message = null;

if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $subject = $_POST['subject'] ?? null;
    $message = $_POST['message'] ?? null;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form 4</title>
    <link rel="stylesheet" href="./css/user-form-4.css">
</head>

<body>

    <div id="main">
        <div >
            <div class="header" >
                Contact Us
            </div>
            <div id="inner-block">
                <form action="" method="post">
                    <input type="text" name="name" id="name" placeholder="Name...">
                    <input type="email" name="email" id="email" placeholder="Email...">
                    <input type="text" name="subject" id="subject" placeholder="Subject...">
                    <textarea name="message" id="message" cols="30" rows="4" placeholder="Message..."></textarea>
                    <input type="submit" value="send message">
                </form>
            </div>
        </div>

    </div>

    <div>
        <!-- your data -->
        <?php
        if (
            $name
            and $subject
            and $message
            and $email
        ){
            echo "Your Contact Us Data <br>";
            echo "Your Name is $name<br>";
            echo "Your Email is $email<br>";
            echo "Subject : $subject<br>";
            echo "Your Message is $message";

        }
        ?>

    </div>

    <script src="./js//user-form-4.js"></script>
</body>

</html>