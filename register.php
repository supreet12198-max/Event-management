<?php
include("db.php");

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // HASH PASSWORD
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // INSERT USER
    $query = "INSERT INTO users(username,password)
              VALUES('$username','$hashed_password')";

    mysqli_query($conn, $query);

    echo "<script>
            alert('Registration Successful');
            window.location='login.php';
          </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="col-md-4 mx-auto card p-4 shadow">

<h3 class="text-center mb-4">Register</h3>

<form method="POST">

<input type="text"
       name="username"
       class="form-control mb-3"
       placeholder="Enter Username"
       required>

<input type="password"
       name="password"
       class="form-control mb-3"
       placeholder="Enter Password"
       required>

<button type="submit"
        name="register"
        class="btn btn-primary w-100">
    Register
</button>

</form>

</div>

</div>

</body>
</html>
