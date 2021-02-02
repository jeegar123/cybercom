<?php


require './db/db_operation.php';

function validateString($string)
{
    $string = filter_var(trim($string), FILTER_SANITIZE_STRING);

    if (filter_var($string, FILTER_VALIDATE_REGEXP, array(
        "options" => array("regexp" => "/^[a-zA-Z\s]*$/")
    ))) {
        return $string;
    } else {
        return false;
    }
}

function validateEmail($email)
{
    $email = filter_var(strtolower(trim($email)), FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        return false;
    }
}

function validatePassword($password)
{
    $password = filter_var(trim($password), FILTER_SANITIZE_STRING);

    if (strlen($password) == 8) {
        return $password;
    } else {
        return false;
    }
}




$fullname = $password = $address = $gender = $age_group = null;
$file_path = null;
$games = [];
$error_messages = [];


// all data in one array
$userData = [];

$is_user_added = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // form data
    $fullname = $_POST['fullName'] ?? null;
    $password = $_POST['password'] ?? null;
    $address = $_POST['address'] ?? null;

    // game data
    $game_hockey = $_POST['hockey'] ?? null;
    $game_football = $_POST['football'] ?? null;
    $game_badminton = $_POST['badminton'] ?? null;
    $game_cricket = $_POST['cricket'] ?? null;
    $game_volleyball = $_POST['volleyball'] ?? null;

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


    $gender = $_POST['gender'] ?? null;
    $age_group = $_POST['age'] ?? null;

    if ($gender) {
        $userData['gender'] = $gender;
    } else {
        array_push($error_messages, "*Gender is required");
    }


    if ($age_group) {
        $userData['age'] = $age_group;
    } else {
        array_push($error_messages, "*Age is required");
    }

    $uploaded_file = $_FILES['file'] ?? null;

    // validated data
    if ($fullname) {
        $fullname = validateString($fullname);
        if (!$fullname) {
            array_push($error_messages, "*Name is invalid");
        } else {
            $userData['fullname'] = $fullname;
        }
    } else {
        array_push($error_messages, "*Name is required");
    }


    if ($password) {
        $password = validatePassword($password);
        if (!$password) {
            array_push($error_messages, "*Password length should be atleast 8");
        } else {
            $userData['password'] =password_hash( $password,PASSWORD_DEFAULT);
        }
    } else {
        array_push($error_messages, "*password is required");
    }



    if ($address) {
        $address = validateString($address);
        if (!$address) {
            array_push($error_messages, "*Address is in invalid");
        } else {
            $userData['address'] = $address;
        }
    } else {
        array_push($error_messages, "*Address is required");
    }

    if (count($games) == 0) {
        array_push($error_messages, "*You must select atleast 1 game");
    } else {
        $tmp =
            $userData['games'] = implode(",", $games);
    }

    if ($uploaded_file and count($userData) >= 6) {
        $extensions = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG');


        if (!in_array(explode("/", $uploaded_file['type'])[1], $extensions)) {
            array_push($error_messages, "*Only image file are allowed");
        } else {
            if (move_uploaded_file($uploaded_file['tmp_name'],  'uploads/' . $uploaded_file['name'])) {
                $file_path = 'uploads/' . $uploaded_file['name'];
                $userData['file_path'] = $file_path;

                // all data in $userData

                addUser($userData,$is_user_added) ;
                    
                
            } else {
                array_push($error_messages, "*file not found");
            }
        }
    } else {
        if (!$uploaded_file)
            array_push($error_messages, "*sorry file can't be upload");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form 1</title>
    <link rel="stylesheet" href="./css/user-form-1.css">
</head>

<body>

    <div id="main">
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

            if ($is_user_added) {
                echo "User is added to database<br>";
                
                
            }

            ?>

        </div>

        <form method="POST" enctype="multipart/form-data">
            <table>
                <thead>
                    <tr>
                        <td colspan="2">User Form</td>
                    </tr>

                </thead>

                <tbody>
                    <tr>
                        <td><label for="fullname">Enter Name</label></td>
                        <td><input type="text" name="fullName" id="fullname"><span class="error" id="error-name"></span></td>
                    </tr>
                    <tr>
                        <td><label for="password">Enter Password</label></td>
                        <td><input type="password" name="password" id="password" maxlength="8"><span class="error " id="error-password"></span><span><br>&nbsp; &nbsp; (max 8length character )</span></td>
                    </tr>
                    <tr>
                        <td><label for="address">Enter Address</label></td>
                        <td><textarea name="address" id="address" cols="30" rows="3"></textarea><span class="error" id="error-address"></span></td>
                    </tr>
                    <tr>
                        <td><label for="game">Select Game</label></td>
                        <td>
                            <div>
                                <input type="checkbox" name="hockey" id="hockey" value="hockey">Hockey<br>
                                <input type="checkbox" name="football" id="football" value="football">football<br>
                                <input type="checkbox" name="badminton" id="Badminton" value="badminton">Badminton<br>
                                <input type="checkbox" name="cricket" id="cricket" value="cricket">cricket<br>
                                <input type="checkbox" name="volleyball" id="volleyball" value="volleyball">volleyball
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender</label></td>
                        <td>
                            <input type="radio" name="gender" id="male" value="male" checked>Male
                            <input type="radio" name="gender" id="male" value="female">Female
                        </td>
                    </tr>
                    <tr>
                        <td><label for="age">Select ur age</label></td>
                        <td>
                            <select name="age" id="age">
                                <option value="" default>Select</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="file-box">
                        <td colspan="2">
                            <input type="file" name="file" id="file" accept="image/*"><span>(upload images)</span>
                        </td>
                    </tr>
                    <tr id="btn-block">
                        <td colspan="2"><input type="reset" value="Reset">
                            <input type="submit" value="Submit Form" id="btnSubmit">
                        </td>
                    </tr>


                </tbody>

            </table>
        </form>
    </div>

    <div id="display-data">
        <!-- display data -->
        <?php

        if (
            $fullname
            and $password
            and $address
            and $games
            and $gender
            and $age_group
            and $file_path
        ) {
            echo "<h3>Your data</h3>";

            echo "Your Name is $fullname<br>";
            echo "Your Password is $password<br>";
            echo "Your Games:<br>";

            echo "<ul>";

            foreach ($games as $game) {
                if ($game)
                    echo "<li>$game</li>";
            }
            echo "</ul>";

            echo "You are $gender<br>";
            echo "Your age group is  $age_group<br>";

            echo "<a href='$file_path' download>download file</a>";
        }
        ?>


    </div>



    <script src="./js/user-form-1.js"></script>

</body>

</html>