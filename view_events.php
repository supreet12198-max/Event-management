<?php
session_start();
include("db.php");

// login check
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

// SEARCH + FILTER (UPDATED)
$today = date("Y-m-d");

$query = "SELECT * FROM events WHERE 1";

// search
if(isset($_GET['search']) && !empty($_GET['search'])){
    $search = $_GET['search'];
    $query .= " AND (title LIKE '%$search%' OR location LIKE '%$search%')";
}

// filter
if(isset($_GET['filter'])){
    if($_GET['filter'] == "upcoming"){
        $query .= " AND date >= '$today'";
    } 
    elseif($_GET['filter'] == "past"){
        $query .= " AND date < '$today'";
    }
}

// order
$query .= " ORDER BY id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Events</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">All Events</span>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </div>
</nav>

<div class="container mt-5">

    <!-- 🔍 SEARCH BAR -->
    <form method="GET" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search event...">
        <button class="btn btn-primary">Search</button>
    </form>

    <!-- 📅 FILTER BUTTONS -->
    <div class="mb-3">
        <a href="?filter=upcoming" class="btn btn-success btn-sm">Upcoming</a>
        <a href="?filter=past" class="btn btn-secondary btn-sm">Past</a>
        <a href="view_events.php" class="btn btn-dark btn-sm">All</a>
    </div>

    <div class="card shadow">
        <div class="card-header text-center">
            <h4>Event List</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>

                        <td>
                            <img src="uploads/<?php echo $row['image']; ?>" width="80" height="60">
                        </td>

                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['location']; ?></td>

                        <td>
                            <a href="delete_event.php?id=<?php echo $row['id']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure?')">
                               Delete
                            </a>

                            <a href="edit_event.php?id=<?php echo $row['id']; ?>" 
                               class="btn btn-warning btn-sm">
                               Edit
                            </a>

                            <a href="event_details.php?id=<?php echo $row['id']; ?>" 
                               class="btn btn-info btn-sm">
                               View
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>