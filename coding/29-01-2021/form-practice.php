<?php

$name = $email = $class_time = $class_info = $gender = $subjects = $agree = null;
$name_error = $email_error = $gender_error = $is_checked_error = null;

//  get form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['name'])
        and isset($_POST['email'])
        and isset($_POST['gender'])
    ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $class_time = $_POST['class_time'] ?? null;
        $class_info = $_POST['class_info'] ?? null;
        $gender = $_POST['gender'];
        $subjects = $_POST['subjects'] ?? null;
    } else {
        check();
    }
}

function check()
{
    global $name_error, $email_error, $gender_error, $is_checked_error;
    if (empty($_POST['name']))
        $name_error = "Name is required";
    if (empty($_POST['email']))
        $email_error = "Email is required";
    if (empty($_POST['gender']))
        $gender_error = "Gender is required";
    if (empty($_POST['agree']))
        $is_checked_error = "You must agree to terms";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form practice</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Abosulute classes registartion</h1>

    <span>
        * requiered field<br>
        * you mist agree to terms
    </span>
    <form method="POST">
        <lable for="name">Name:</lable>
        <input type="text" name="name">
        <span><?= $name_error ?></span>
        <br>
        <lable for="name">Email:</lable>
        <input type="email" name="email">
        <span><?= $email_error ?></span>
        <br>
        <label for="time">Time:</label>
        <input type="time" name="class_time" id="time">
        <br>
        <label for="clasess">Classes:</label>
        <textarea name="class_info" cols="30" rows="10"></textarea>
        <br>
        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="male">male
        <input type="radio" name="gender" value="female">female
        <span><?= $gender_error ?></span>
        <br>
        <label for="select">Select:</label>
        <select multiple size="4" name="subjects[]">
            <option>Android</option>
            <option>Java</option>
            <option>C#</option>
            <option>Database</option>
            <option>JS</option>
        </select>
        <br>
        Agree <input type="checkbox" name="agree"><span><?= $is_checked_error ?></span>
        <br>

        <input type="submit" value="submit">
    </form>

    <div>

        <!-- display data -->
        <h2>Your given values are as :</h2>
        <div>
            Your name is <?= $name ?>
            <br>
            your email address is <?= $email ?>
            <br>
            Your class time at <?= $class_time ?>
            <br>
            Your class info <?= $class_info ?>
            <br>
            your gender is <?= $gender ?>
            <br>
            Your Subjects :
            <ul>

                <?php
                if ($subjects)
                    foreach ($subjects as $subject) {
                        echo "<li>$subject</li>";
                    }
                ?>
            </ul>
        </div>

</body>

</html>