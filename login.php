<?php
session_start();
include("db.php");

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // FIND USER
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        // VERIFY PASSWORD
        if(password_verify($password, $row['password'])){

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            echo "<script>
                    alert('Login Successful');
                    window.location='dashboard.php';
                  </script>";

        } else {

            echo "<script>
                    alert('Wrong Password');
                  </script>";
        }

    } else {

        echo "<script>
                alert('Username Not Found');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="col-md-4 mx-auto card p-4 shadow">

<h3 class="text-center mb-4">Login</h3>

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
        name="login"
        class="btn btn-success w-100">
    Login
</button>

</form>

</div>

</div>

</body>
</html>
