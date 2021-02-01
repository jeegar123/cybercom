<?php

$fullname = $password = $address = $gender = $age_group = null;
$file_path = null;
$games = [];
if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

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


    $games['hockey'] = $game_hockey;
    $games['football'] = $game_football;
    $games['badminton'] = $game_badminton;
    $games['cricket'] = $game_cricket;
    $games['volleyball'] = $game_volleyball;



    $gender = $_POST['gender'] ?? null;
    $age_group = $_POST['age'] ?? null;
    $uploaded_file = $_FILES['file'] ?? null;

    if ($uploaded_file) {
        if (move_uploaded_file($uploaded_file['tmp_name'],  'uploads/' . $uploaded_file['name'])) {
            $file_path = 'uploads/' . $uploaded_file['name'];
        }
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
                        <td><input type="password" name="password" id="password"><span class="error " id="error-password"></span></td>
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
                                <option value="0-10">0-10</option>
                                <option value="10-20">10-20</option>
                                <option value="20-30">20-30</option>
                                <option value="30-50">30-50</option>
                                <option value="50+">Above 50</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="file-box">
                        <td colspan="2">
                            <input type="file" name="file" id="file">
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