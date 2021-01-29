<h1>File handling</h1>


<h2>Add User</h2>
<form method="POST">
    <input type="email" name="useremail" placeholder="Email">
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="add">
</form>


<?php

use function PHPSTORM_META\type;

if (isset($_POST['useremail']) and isset($_POST['password'])) {

    $email = htmlentities($_POST['useremail']);
    $password = htmlentities($_POST['password']);

    if (file_exists('users.txt')) {
        $file = fopen('users.txt', 'a');
    } else {
        $file = fopen('users.txt', 'w');
    }

    $data = array(
        'email' => $email,
        'password' => $password
    );

    fwrite($file, json_encode($data) . "\n");
    fclose($file);
    echo "user added";
}
?>

<div>
    <!-- All users -->
    <h2>All Users</h2>
    <?php
    if (file_exists('users.txt')) {
        $data = file('users.txt');
    }else{
        echo "no user exitis";
        exit();
    }

    ?>

    <table>
        <thead>
            <tr>
                <th>Sr</th>
                <th>username</th>
                <th>password</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $i = 1;
            foreach ($data as $user) {
                $user = json_decode($user, true);
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['password'] ?></td>
                </tr>
            <?php
                $i++;
            }
            ?>

        </tbody>
    </table>






</div>