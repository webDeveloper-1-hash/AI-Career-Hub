<?php
session_start();
include("auth.php");
include("../config/connection.php");

if(isset($_POST['add_company'])){

    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $website      = mysqli_real_escape_string($conn, $_POST['website']);
    $email        = mysqli_real_escape_string($conn, $_POST['email']);
    $phone        = mysqli_real_escape_string($conn, $_POST['phone']);
    $location     = mysqli_real_escape_string($conn, $_POST['location']);
    $description  = mysqli_real_escape_string($conn, $_POST['description']);

    $logo = "";

    // Upload Logo
    if(isset($_FILES['logo']) && $_FILES['logo']['error'] == 0){

        $allowed = ['jpg','jpeg','png','webp'];

        $ext = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));

        if(in_array($ext, $allowed)){

            if(!is_dir("../uploads/company")){
                mkdir("../uploads/company", 0777, true);
            }

            $logo = time().'_'.basename($_FILES['logo']['name']);

            move_uploaded_file(
                $_FILES['logo']['tmp_name'],
                "../uploads/company/".$logo
            );

        }else{

            $_SESSION['error'] = "Only JPG, JPEG, PNG and WEBP files are allowed.";
            header("Location: add-company.php");
            exit();
        }
    }

    $sql = "INSERT INTO companies
    (company_name, logo, website, email, phone, location, description)

    VALUES

    ('$company_name','$logo','$website','$email','$phone','$location','$description')";

    if(mysqli_query($conn,$sql)){

        $_SESSION['success'] = "Company Added Successfully.";

        header("Location: companies.php");
        exit();

    }else{

        $_SESSION['error'] = mysqli_error($conn);
    }
}

include("include/head.php");
?>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">
<h3>Add Company</h3>
</div>

<div class="card-body">

<?php
if(isset($_SESSION['success'])){
    echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}

if(isset($_SESSION['error'])){
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label class="form-label">Company Name</label>
<input
type="text"
name="company_name"
class="form-control"
required>
</div>

<div class="mb-3">
<label class="form-label">Company Logo</label>
<input
type="file"
name="logo"
class="form-control"
accept=".jpg,.jpeg,.png,.webp">
</div>

<div class="mb-3">
<label class="form-label">Website</label>
<input
type="url"
name="website"
class="form-control"
placeholder="https://example.com">
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input
type="email"
name="email"
class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Phone</label>
<input
type="text"
name="phone"
class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Location</label>
<input
type="text"
name="location"
class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea
name="description"
rows="5"
class="form-control"></textarea>
</div>

<button
type="submit"
name="add_company"
class="btn btn-success">
Add Company
</button>

<a
href="companies.php"
class="btn btn-secondary">
Back
</a>

</form>

</div>

</div>

</div>

<?php include("include/footer.php"); ?>