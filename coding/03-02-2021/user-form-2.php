<?php

require './db/db_form_2_operation.php';
require './validation/validation.php';

$firstname = $password = $address = $gender = $day = $month = $year = $martial_status = $is_agree = null;
$games = [];
$date_of_birth = null;
$error_message = [];
$user = [];
$is_added = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // form data
    $firstname = $_POST['firstname'] ?? null;
    $password = $_POST['password'] ?? null;
    $address = $_POST['address'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $martial_status = $_POST['martial_status'] ?? null;
    $is_agree = $_POST['isagree'] ?? null;

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


    // games
    // game data
    $game_hockey = $_POST['hockey'] ?? null;
    $game_football = $_POST['football'] ?? null;
    $game_badminton = $_POST['badminton'] ?? null;
    $game_cricket = $_POST['cricket'] ?? null;
    $game_volleyball = $_POST['volleyball'] ?? null;

    // adding game
    if ($game_hockey)
        $games['hockey'] = $game_hockey;

    if ($game_football)
        $games['football'] = $game_football;

    if ($game_badminton)
        $games['badminton'] = $game_badminton;

    if ($game_cricket)
        $games['cricket'] = $game_cricket;

    if ($game_volleyball)
        $games['volleyball'] = $game_volleyball;



    // validation
    if ($firstname) {
        if ($firstname = validateName($firstname)) {
            $user['first_name'] = $firstname;
        } else {
            array_push($error_message, '*firstname is invalid');
        }
    } else {
        array_push($error_message, '*firstname is required');
    }


    if ($password) {
        if ($password = validatePassword($password)) {
            $user['password'] = password_hash($password, PASSWORD_DEFAULT);
        } else {
            array_push($error_message, '*password is invalid');
        }
    } else {
        array_push($error_message, '*password is required');
    }

    if ($gender) {
        $user['gender'] = $gender;
    } else {
        array_push($error_message, '*Gender is required');
    }

    if ($address) {
        if ($address = validateString($address)) {
            $user['address'] = $address;
        } else {
            array_push($error_message, '*address is invalid');
        }
    } else {
        array_push($error_message, '*address is required');
    }

    if ($date_of_birth) {
        $user['dob'] = $date_of_birth;
    } else {
        array_push($error_message, '*date of birth is required');
    }

    if ($games) {
        $user['games'] = implode(",", $games);
    } else {
        array_push($error_message, '*Atleast 1 game is required');
    }

    if ($martial_status != null) {
        $user['martial_status'] = $martial_status;
    } else {
        array_push($error_message, '*Martial Status is required');
    }

    if ($is_agree) {
        $user['is_agree'] = 1;
    } else {
        array_push($error_message, '*Please Accept our terms can condition');
    }
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-2</title>
    <link rel="stylesheet" href="./css/user-form-2.css">
</head>

<body>
    <div class="error">
        <?php
        if ($error_message) {
            echo "<ul>";
            foreach ($error_message as  $message) {
                echo "$message<br>";
            }
            echo "</ul>";
        }
        ?>
    </div>
    <div class="success">
        <?php

        if (count($user) == 8) {

            addUser($user, $is_added);
        }
        if ($is_added) {
            echo "user added in database";
        }
        ?>
    </div>
    <form method="POST">

        <fieldset>
            <legend>User Form</legend>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" id="firstname"><span class="error" id="error-name"></span>
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="password" maxlength="8"><span class="error " id="error-password"></span>
                <span>(only 8 character password allowed)</span>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" id="male" value="male">Male
                <input type="radio" name="gender" id="male" value="female">Female
            </div>
            <div class="form-group">
                <label for="address"> Address</label>
                <textarea name="address" id="address" rows="5" cols="20"></textarea><span class="error" id="error-address"></span>
            </div>
            <div class="form-group">
                <label for="">D.O.B</label>
                <select name="month" id="month" required>
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
                <label>SELECT GAMES </label>
                <input type="checkbox" name="hockey" id="hockey" value="hockey">Hockey
                <input type="checkbox" name="football" id="football" value="football">football
                <input type="checkbox" name="badminton" id="Badminton" value="badminton">Badminton
                <input type="checkbox" name="cricket" id="cricket" value="cricket">cricket
                <input type="checkbox" name="volleyball" id="volleyball" value="volleyball">volleyball
            </div>

            <div class="form-group">
                <label for="status">Married Status</label>
                <input type="radio" name="martial_status" id="martial_status" value="1">Married
                <input type="radio" name="martial_status" id="martial_status" value="0">Unmarried
            </div>
            <div>
                <input type="reset" value="Reset">
                <input type="submit" value="Submit Form" id="btnSubmit">
            </div>
            <input type="checkbox" name="isagree" id=""> I accept this agreement

        </fieldset>

    </form>


    <div>
        <?php

        if (count($user) == 8) {
            echo "<h3>Your data</h3>";

            echo "Your Name is $firstname<br>";
            echo "Your Password is $password<br>";
            echo "Your Games:<br>";

            echo "<ul>";

            foreach ($games as $game) {
                if ($game)
                    echo "<li>$game</li>";
            }
            echo "</ul>";

            echo "You are $gender<br>";
            if ($martial_status) {
                echo "You are married<br>";
            } else {
                echo "You are unmarried<br>";
            }
            echo "Your birthdate $date_of_birth<br>";

            if ($is_agree) {
                echo "Thank you for accepting our Terms and policy";
            } else {
                echo "oh! You missed our terms and condition ";
            }
        }
        ?>

    </div>

    <a href="./index.php">Go back</a>
    <script src="./js/user-form-2.js"></script>


</body>

</html>