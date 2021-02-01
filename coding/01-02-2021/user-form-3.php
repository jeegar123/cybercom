<?php


$firstname = $lastname = $date_of_birth = $gender = $country = $email = $phone_number  = null;
$password = $confirm_password = $is_agree = null;


if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

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
        $date_of_birth = "$year-$month-$day";
    }

    $gender = $_POST['gender'] ?? null;
    $country = $_POST['country'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone_number = $_POST['phonenumber'] ?? null;

    $password = $_POST['password'] ?? null;
    $confirm_password = $_POST['confirm_password'] ?? null;

    $is_agree = $_POST['isagree'] ?? null;
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
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password">
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
        if (
            $firstname
            and $lastname
            and $date_of_birth
            and $gender
            and $country
            and $email
            and $phone_number
            and $password
            and $confirm_password
            and $is_agree
        ) {

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

    <script src="./js/user-form-3.js"></script>
</body>

</html>