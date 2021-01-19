<?php
// personal information
$firstName = $_POST['txtFirstName'];
$lastName = isset($_POST['txtLastname']) ? $_POST['txtLastname'] : null;
$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;

// account information

$email = $_POST['email'];
$password = $_POST['password'];
$security_question = isset($_POST['security_question']) ? $_POST['security_question'] : null;
$security_ans = isset($_POST['security_ans']) ? $_POST['security_ans'] : null;


// contact information

$address = isset($_POST['address']) ? $_POST['address'] : null;
$city = isset($_POST['city']) ? $_POST['city'] : null;
$state = isset($_POST['state']) ? $_POST['state'] : null;
$zipcode1 = isset($_POST['zipcode1']) ? $_POST['zipcode1'] : null;
$zipcode2 = isset($_POST['zipcode2']) ? $_POST['zipcode2'] : null;
$phoneNo = $_POST['phone'];
$phoneType = $_POST['phone_type'];

echo "<table border=2>
    <thead>
        <tr>
        <th>Head</th>
        <th>Data</th>
        </tr>

    </thead>
    <tbody>
    <tr>
    <td>Full Name</td>
    <td>$firstName $lastName</td>
</tr>
<tr>
    <td>Date Of Birth</td>
    <td>$day - $month -$year</td>
</tr>
<tr>
    <td>Gender</td>
    <td>$gender</td>
</tr>

<tr>
    <td>
        email
    </td>
    <td>
    $email;
    </td>
</tr>

<tr>
    <td>$security_question</td>
    <td>$security_ans</td>
</tr>

<tr>
    <td>Address</td>
    <td>$address</td>
</tr>

<tr>
    <td>city</td>
    <td>$city</td>
</tr>

<tr>
    <td>state</td>
    <td>$state</td>
</tr>

<tr>
    <td>zip code</td>
    <td>$zipcode1 $zipcode2</td>
</tr>
<tr>
    <td>$phoneType</td>
    <td>$phoneNo</td>
</tr>

    </tbody>

    
</table>";
