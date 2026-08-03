<?php
include ('include/head.php');
include('config/connection.php');
?>

<!-- Navbar -->
<?php


$sql = "SELECT * FROM jobs ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>



<?php

$search = $_GET['search'] ?? '';
$location = $_GET['location'] ?? '';

$sql = "SELECT * FROM jobs WHERE 1=1";

if ($search != '') {
    $search = mysqli_real_escape_string($conn, $search);
    $sql .= " AND title LIKE '%$search%'";
}

if ($location != '') {
    $location = mysqli_real_escape_string($conn, $location);
    $sql .= " AND location='$location'";
}

$sql .= " ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
$category = $_GET['category'] ?? '';

if ($category != '') {
    $category = mysqli_real_escape_string($conn, $category);
    $sql .= " AND category='$category'";
}
?>



<!-- Hero -->

<section class="hero">

    <div class="container">

        <h1>Find Your Dream Job</h1>

        <p>Search thousands of verified jobs from top companies.</p>

    </div>

</section>

<!-- Search -->

<form method="GET" action="jobs.php" class="container my-5">

<div class="row g-3">

    <div class="col-md-6">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search Job"
            value="<?php echo htmlspecialchars($search); ?>">
    </div>

    <div class="col-md-2">
        <select name="location" class="form-select">
            <option value="">All Locations</option>
            <option value="Karachi">Karachi</option>
            <option value="Lahore">Lahore</option>
            <option value="Islamabad">Islamabad</option>
            <option value="Peshawar">Peshawar</option>
        </select>
        
    </div>

    <div class="col-md-2">
            
            <select name="category" class="form-select">
        <option value="">All Categories</option>
        <option value="IT">IT</option>
        <option value="Web Development">Web Development</option>
        <option value="AI">AI</option>
        <option value="Marketing">Marketing</option>
    </select>
        </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">
            Search
        </button>
    </div>

</div>

</form>

<!-- Jobs -->

<section class="container">

<div class="row">

<?php while($job = mysqli_fetch_assoc($result)) { ?>

<div class="col-lg-4 col-md-6 mb-4">

<div class="card shadow h-100">

<div class="card-body">

<h4><?php echo $job['title']; ?></h4>

<p><strong>Company:</strong> <?php echo $job['company']; ?></p>

<p><strong>Location:</strong> <?php echo $job['location']; ?></p>

<p><strong>Salary:</strong> <?php echo $job['salary']; ?></p>

<span class="badge bg-primary">
<?php echo $job['job_type']; ?>
</span>

<br><br>

<a href="job-details.php?id=<?php echo $job['id']; ?>" class="btn btn-primary">
    View Details
</a>

</div>

</div>

</div>

<?php } ?>

</div>

</section>

<?php
include("include/footer.php");
?>