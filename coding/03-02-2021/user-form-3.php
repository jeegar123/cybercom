<?php


require './db/db_form_3_operation.php';
require './validation/validation.php';

$firstname = $lastname = $date_of_birth = $gender = $country = $email = $phone_number  = null;
$password = $confirm_password = $is_agree = null;

$user = [];
$is_added = false;
$error_messages = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // fetching form details
    $firstname = $_POST['firstname'] ?? null;
    $lastname = $_POST['lastname'] ?? null;

    // date
    $month = $_POST['month'] ?? null;
    $day = $_POST['day'] ?? null;
    $year = $_POST['year'] ?? null;

    if (
        $day
        and $month
        and $year
    ) {
        $month = date_parse($month)['month'];
        $date_of_birth = "$year-$month-$day";
        $date_of_birth = date('Y-m-d', strtotime($date_of_birth));
    }

    $gender = $_POST['gender'] ?? null;
    $country = $_POST['country'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone_number = $_POST['phonenumber'] ?? null;

    $password = $_POST['password'] ?? null;
    $confirm_password = $_POST['confirm_password'] ?? null;

    $is_agree = $_POST['isagree'] ?? null;



    // validation
    if ($firstname) {
        if ($firstname = validateName($firstname)) {
            $user['first_name'] = $firstname;
        } else {
            array_push($error_messages, '*firstname is invalid');
        }
    } else {
        array_push($error_messages, '*firstname is required');
    }

    if ($lastname) {
        if ($firstname = validateName($firstname)) {
            $user['last_name'] = $firstname;
        } else {
            array_push($error_messages, '*lastname is invalid');
        }
    } else {
        array_push($error_messages, '*lastname is required');
    }

    if ($date_of_birth) {
        $user['dob'] = $date_of_birth;
    } else {
        array_push($error_messages, '*date of birth is required');
    }


    if ($gender) {
        $user['gender'] = $gender;
    } else {
        array_push($error_messages, '*Gender is required');
    }

    if ($country) {
        $user['country'] = $country;
    } else {
        array_push($error_messages, '*country is required');
    }

    if ($email) {
        if ($email = validateEmail($email)) {
            $user['email'] = $email;
        } else {
            array_push($error_messages, '*email is invalid');
        }
    } else {
        array_push($error_messages, '*email is required');
    }

    if ($phone_number) {
        if ($phone_number = validatePhone($phone_number)) {
            $user['phone'] = $phone_number;
        } else {
            array_push($error_messages, '*phone number is invalid');
        }
    } else {
        array_push($error_messages, '*phone is required');
    }

    if ($password) {
        if ($password = validatePassword($password)) {
            $user['password'] = password_hash($password, PASSWORD_DEFAULT);
        } else {
            array_push($error_messages, '*password is invalid');
        }
    } else {
        array_push($error_messages, '*password is required');
    }

    if ($password === $confirm_password) {
    } else {
        array_push($error_messages, '*password is didn\'t  match');
    }


    if ($is_agree) {
        $user['is_agree'] = 1;
    } else {
        array_push($error_messages, '*Please Accept our terms can condition');
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form 3</title>
    <link rel="stylesheet" href="./css/user-form-3.css">
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

        if (count($user) == 9) {

            addUser($user, $is_added);
        }
        if ($is_added) {
            echo "user added in database";
        }
        ?>
    </div>
    <div class="main">
        <div class="header">Signup</div>
        <div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" placeholder="Enter Last Name">
                </div>
                <div class="form-group ">
                    <label for="">D.O.B</label>
                    <select name="month" id="month" required class="date">
                        <option value="jan">Jan</option>
                    </select>
                    <select name="day" id="day" required>
                        <option value="1">1</option>
                    </select>
                    <select name="year" id="year" required>
                        <option value="1990">1990</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender" id="male" value="male"><label> Male</label>
                    <input type="radio" name="gender" id="female" value="female"><label>Female</label>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" id="country">
                        <option value="">Country</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter E-mail">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phonenumber" id="phonenumber" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" maxlength="8" > 
                    
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" maxlength="8">
                    <span class="error" id="error-password"></span>
                </div>
                <div class="form-group">

                    <input type="checkbox" name="isagree" id="isagree"> I Agree to the Terms of Use
                </div>

                <div class="btn-block">
                    <input type="submit" value="Submit" id="btnSubmit">
                    <input type="button" value="Cancel" id="btnCancel">

                </div>

            </form>
        </div>


    </div>


    <div>
        <!-- display data -->
        <?php
        if (count($user) == 9) {

            echo "Your Name is $firstname $lastname<br>";
            echo "Your Birthday is $date_of_birth<br>";
            echo "Your Gender is $gender<br>";
            echo "Your Country is $country<br>";
            echo "Your Email is $email<br>";
            echo "Your Phone No. is $phone_number<br>";
            echo "Your Password is $password<br>";
            if ($is_agree) {
                echo "Thank you for accepting our Terms and policy";
            } else {
                echo "oh! You missed our terms and condition ";
            }
        }
        ?>

    </div>
    <a href="./index.php">Go back</a>
    <script src="./js/user-form-3.js"></script>
</body>

</html>