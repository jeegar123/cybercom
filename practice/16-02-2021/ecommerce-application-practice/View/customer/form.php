<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>customer</title>
  <link rel="stylesheet" href="http://localhost/cybercom/practice/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="">

</head>

<body>
  <div class="container">
    <h1 class="text-center">Add Customer</h1>
    <form action="<?php
                  $url =    $this->getUrl('save');

                  if ($customer['customer_id'])
                    $url =    $this->getUrl('update');

                  echo  $url;

                  ?>
    
    " method="post">
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