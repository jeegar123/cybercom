<?php


use adapters\CustomerAdapter;
require '../adapters/CustomerAdapter.php';

$customer = [
  'first_name' => '',
  'last_name' => '',
  'email' => '',
  'password' => '',
  'customer_id' => 0,
];
if (isset($_GET['id'])) {
  $adapter = new CustomerAdapter();
  $customer = $adapter->getCustomerDeatils($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>customer</title>
  <link rel="stylesheet" href="../../../13-02-2021/curd-operation/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1 class="text-center">Add Customer</h1>
    <form action="../db/add_customer.php" method="post">
      <input type="hidden" name="id" value="<?= $customer['customer_id'] ?>">
      <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="firstName" id="firstName" value="<?= $customer['first_name'] ?>" required>
      </div>
      <div class="form-group">
        <label for="lastName">last Name</label>
        <input type="text" class="form-control" name="lastName" id="lastName" value="<?= $customer['last_name'] ?>" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?= $customer['email'] ?>" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>

      <input type="submit" value="Submit" class="btn btn-primary">
    </form>

  </div>
</body>

</html>