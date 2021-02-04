<h1>OOP with PHP</h1>

<?php


// require './class/User.php';
//  auto reload file
spl_autoload_register(function ($class_name) {
    include './class/' . $class_name . '.php';
});

$user = new User("test@gmail.com", "ss");


echo "<pre>";
print_r($user);
echo "</pre>";


echo $user->message . '<br>';

echo 'Your Old Username ' . $user->userName . '<br>';
$user->userName = "je@gmail.com";

echo 'Your New Username ' . $user->userName . '<br>';

$user->display();

echo '<br> class Name ' . $user::className . '<br>';



$admin = new Admin('admin@gmail.com', 'aaaadsa', 'Admin Admin');
$admin->display();


echo "<br>";
echo  serialize($admin);
echo "<br>";
print_r(unserialize(serialize($admin)));


echo strlen($user->message);

session_start();

$_SESSION['user'] = serialize($admin);


if (isset($_SESSION['user'])) {
    echo '<br>Data in session<br>';
    echo $_SESSION['user'];
    unset($_SESSION['user']);
}

echo "<br>";
$db = new Database('localhost','root','','trainning_db');
$user =array(
    'email'=>'<a href=\'index.php\'>test</a>',
    'password' =>'sddsds'
);


$db->insert("users",$user);
echo "<pre>";
// print_r($db->select('users'));
echo "</pre>";

echo "<br>";

$interfaceDemo =new ImplInterfaceDemo();
$interfaceDemo->sayHello();