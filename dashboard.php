<?php
session_start();

// login check
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Event Management System</span>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="container mt-5">

    <!-- Welcome -->
    <div class="text-center mb-4">
        <h3>Welcome, <?php echo $_SESSION['username']; ?> 👋</h3>
    </div>

    <!-- Buttons -->
    <div class="row justify-content-center">

        <div class="col-md-4 mb-3">
            <a href="add_event.php" class="btn btn-primary w-100 p-3">
                ➕ Add Event
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="view_events.php" class="btn btn-success w-100 p-3">
                📄 View Events
            </a>
        </div>

    </div>

    <!-- Info Section -->
    <div class="card mt-4 shadow">
        <div class="card-body text-center">
            <h5>Your Event Management Panel</h5>
            <p>Here you can add, view, edit, and manage all events easily.</p>
        </div>
    </div>

</div>

</body>
</html>