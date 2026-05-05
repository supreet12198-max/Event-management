<?php
session_start();
include("db.php");

// login check
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

// create event
if(isset($_POST['create'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $seats = $_POST['seats'];
    $category = $_POST['category'];
    $organizer = $_POST['organizer'];
    $email = $_POST['email'];

    // image upload
    $image = $_FILES['image']['name'];
    $tmp   = $_FILES['image']['tmp_name'];

    if($image != ""){
        $image_name = time() . "_" . $image;
        move_uploaded_file($tmp, "uploads/" . $image_name);
    } else {
        $image_name = "";
    }

    // validation
    if($title=="" || $description=="" || $date=="" || $time=="" || $location=="" || $seats==""){
        echo "<script>alert('All required fields must be filled');</script>";
    } else {

        $query = "INSERT INTO events 
        (title, description, date, time, location, seats, category, organizer, email, image, created_by)
        VALUES 
        ('$title','$description','$date','$time','$location','$seats','$category','$organizer','$email','$image_name','".$_SESSION['username']."')";

        if(mysqli_query($conn, $query)){
            echo "<script>alert('Event Created Successfully'); window.location='view_events.php';</script>";
        } else {
            echo "<script>alert('Error creating event');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Event</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}
.card{
    border-radius:15px;
}
</style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">Add Event</span>
    <a href="dashboard.php" class="btn btn-light">Back</a>
  </div>
</nav>

<div class="container mt-5">
    <div class="col-md-6 mx-auto card p-4 shadow">

        <h3 class="text-center mb-3">Add New Event</h3>

        <form method="POST" enctype="multipart/form-data">

            <input type="text" name="title" class="form-control mb-3" placeholder="Event Title">

            <textarea name="description" class="form-control mb-3" placeholder="Description"></textarea>

            <input type="date" name="date" class="form-control mb-3">

            <input type="time" name="time" class="form-control mb-3">

            <input type="text" name="location" class="form-control mb-3" placeholder="Location">

            <input type="number" name="seats" class="form-control mb-3" placeholder="Total Seats">

            <!-- Category -->
            <select name="category" class="form-control mb-3">
                <option value="">Select Category</option>
                <option>Seminar</option>
                <option>Workshop</option>
                <option>Party</option>
            </select>

            <!-- Organizer -->
            <input type="text" name="organizer" class="form-control mb-3" placeholder="Organizer Name">

            <!-- Email -->
            <input type="email" name="email" class="form-control mb-3" placeholder="Contact Email">

            <!-- Image -->
            <input type="file" name="image" class="form-control mb-3">

            <button type="submit" name="create" class="btn btn-primary w-100">
                Add Event
            </button>

        </form>

    </div>
</div>

</body>
</html>