<?php

require './db/db_contact_us_operation.php';
require './validation/validation.php';

$name = $email = $subject = $message = null;
$error_messages = [];
$userData = [];
$is_added = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $subject = $_POST['subject'] ?? null;
    $message = $_POST['message'] ?? null;


    // validated data
    if ($name) {
        $name = validateName($name);
        if (!$name) {
            array_push($error_messages, "*Name is invalid");
        } else {
            $userData['name'] = $name;
        }
    } else {
        array_push($error_messages, "*Name is required");
    }

    if ($email) {
        if ($email = validateEmail($email)) {
            $userData['email'] = $email;
        } else {
            array_push($error_messages, '*email is invalid');
        }
    } else {
        array_push($error_messages, '*email is required');
    }


    if ($subject) {
        $subject = validateString($subject);
        if (!$subject) {
            array_push($error_messages, "*Subject is invalid");
        } else {
            $userData['subject'] = $subject;
        }
    } else {
        array_push($error_messages, "*subject is required");
    }

    if ($message) {
        $message = validateString($message);
        if (!$message) {
            array_push($error_messages, "*message is invalid");
        } else {
            $userData['message'] = $subject;
        }
    } else {
        array_push($error_messages, "*message is required");
    }
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
    <div class="error">
        <?php
        if ($error_messages) {
            echo "<ul>";
            foreach ($error_messages as  $message) {
                echo "$message<br>";
            }
            echo "</ul>";
        }
        ?>
    </div>
    <div class="success">
        <?php

        if (count($userData) == 4) {

            addUser($userData, $is_added);
        }
        if ($is_added) {
            echo "user added in database";
        }
        ?>
    </div>
    <div id="main">
        <div>
            <div class="header">
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
        if (count($userData) == 4) {
            echo "Your Contact Us Data <br>";
            echo "Your Name is $name<br>";
            echo "Your Email is $email<br>";
            echo "Subject : $subject<br>";
            echo "Your Message is $message";
        }
        ?>

    </div>
    <a href="./index.php">Go back</a>
    <script src="./js//user-form-4.js"></script>
</body>

</html>