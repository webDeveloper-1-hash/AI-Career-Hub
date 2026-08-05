<?php
include("../include/body.php");
include("../config/connection.php");

$result = mysqli_query($conn, "SELECT * FROM companies ORDER BY company_name ASC");
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            AI Career Hub
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            
            <ul class="navbar-nav ms-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li> -->
                
                <li class="nav-item">
                    <a class="nav-link" href="add_company.php">Add Company</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="edit_company.php">Edit Company</a>
                </li>
     

                
                <li class="nav-item">
                    <a class="nav-link" href="delete_company.php">Delete company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="auth/logout.php">logout</a>
                </li>
                
                
                <?php if(isset($_SESSION['user_id'])) { ?>
                
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" href="auth/logout.php">Logout</a>
                    </li>

                <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php"></a>
                    </li>

                <?php } ?>

            </ul>

        </div>

    </div>
</nav>
<!-- Hero -->
<section class="hero bg-primary text-white py-5">
    <div class="container text-center">
        <h1>Our Companies</h1>
        <p>Explore companies hiring on AI Career Hub.</p>
    </div>
</section>

<!-- Companies -->
<div class="container my-5">

<div class="row">

<?php
if(mysqli_num_rows($result)>0){

while($company=mysqli_fetch_assoc($result)){
?>

<div class="col-md-4 mb-4">

<div class="card shadow h-100">

<?php if($company['logo']!=""){ ?>

<img
src="uploads/company/<?php echo $company['logo']; ?>"
class="card-img-top"
style="height:220px;object-fit:contain;padding:15px;">

<?php } ?>

<div class="card-body">

<h4>
<?php echo htmlspecialchars($company['company_name']); ?>
</h4>

<p>
<strong>Location:</strong>
<?php echo htmlspecialchars($company['location']); ?>
</p>

<p>
<strong>Email:</strong><br>
<?php echo htmlspecialchars($company['email']); ?>
</p>

<p>
<strong>Website:</strong><br>

<a
href="<?php echo htmlspecialchars($company['website']); ?>"
target="_blank">

<?php echo htmlspecialchars($company['website']); ?>

</a>

</p>

<p>

<?php

echo substr(
htmlspecialchars($company['description']),
0,
120
);

?>...

</p>

<a
href="company-details.php?id=<?php echo $company['id']; ?>"
class="btn btn-primary w-100">

View Company

</a>

</div>

</div>

</div>

<?php
}
}else{
?>

<div class="col-12">

<div class="alert alert-warning">

No Companies Found.

</div>

</div>

<?php } ?>

</div>

</div>

<?php include("../include/footer.php"); ?>