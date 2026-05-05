<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Management System</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
        }

        .navbar{
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .hero{
            height: 90vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('https://images.unsplash.com/photo-1523580846011-d3a5bc25702b');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .hero h1{
            font-size: 50px;
            font-weight: 600;
        }

        .feature-card{
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }

        .feature-card:hover{
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        footer{
            margin-top: 50px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">

    <span class="navbar-brand fw-bold">Event System</span>

    <div>
        <a href="index.php" class="btn btn-outline-light me-2">Home</a>

        <?php if(isset($_SESSION['username'])) { ?>

            <a href="dashboard.php" class="btn btn-success me-2">Dashboard</a>
            <a href="view_events.php" class="btn btn-primary me-2">Events</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>

        <?php } else { ?>

            <a href="login.php" class="btn btn-outline-light me-2">Login</a>
            <a href="register.php" class="btn btn-warning">Register</a>

        <?php } ?>

    </div>

  </div>
</nav>

<!-- HERO -->
<div class="hero">
    <div>
        <h1>Manage Your Events Easily</h1>
        <p class="mt-3">Create and manage events in a smart way</p>

        <?php if(!isset($_SESSION['username'])) { ?>
            <a href="register.php" class="btn btn-lg btn-warning mt-4">Get Started</a>
        <?php } else { ?>
            <a href="dashboard.php" class="btn btn-lg btn-success mt-4">Go to Dashboard</a>
        <?php } ?>
    </div>
</div>

<!-- FEATURES -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Features</h2>

    <div class="row text-center">

        <div class="col-md-4">
            <div class="card p-4 feature-card shadow">
                <h4>Create Events</h4>
                <p>Create and manage events easily with full control.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 feature-card shadow">
                <h4>Manage Events</h4>
                <p>Edit, delete and organize your events efficiently.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 feature-card shadow">
                <h4>Track Activity</h4>
                <p>See all your created events in one place.</p>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3">
    © <?php echo date("Y"); ?> Event Management System | Developed by Kishita & Supreet
</footer>

</body>
</html>