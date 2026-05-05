<?php
session_start();
include("db.php");

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){

        $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){

            $user = mysqli_fetch_assoc($result);

            if(password_verify($password, $user['password'])){

                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                echo "<script>alert('Login Successful'); window.location='dashboard.php';</script>";

            } else {
                echo "<script>alert('Wrong Password');</script>";
            }

        } else {
            echo "<script>alert('User Not Found');</script>";
        }

    } else {
        echo "<script>alert('Please fill all fields');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body{
        background: linear-gradient(135deg, #f40bbe, #0b8bf4);
        height: 100vh;
    }

    .card{
        border-radius: 15px;
        background: rgba(255,255,255,0.95);
    }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>

                <div class="card-body">
                    <form method="POST">

                        <input type="text" name="username" class="form-control mb-3" placeholder="Username">

                        <input type="password" name="password" class="form-control mb-3" placeholder="Password">

                        <button type="submit" name="login" class="btn btn-success w-100">
                            Login
                        </button>

                    </form>

                    <p class="mt-3 text-center">
                        Don't have an account? <a href="register.php">Register</a>
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>