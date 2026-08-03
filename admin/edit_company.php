<?php
session_start();
include("auth.php");
include("../config/connection.php");

if (!isset($_GET['id'])) {
    header("Location: companies.php");
    exit();
}

$id = (int)$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM companies WHERE id='$id'");

if (mysqli_num_rows($result) == 0) {
    $_SESSION['error'] = "Company not found.";
    header("Location: companies.php");
    exit();
}

$company = mysqli_fetch_assoc($result);

if (isset($_POST['update_company'])) {

    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $website      = mysqli_real_escape_string($conn, $_POST['website']);
    $email        = mysqli_real_escape_string($conn, $_POST['email']);
    $phone        = mysqli_real_escape_string($conn, $_POST['phone']);
    $location     = mysqli_real_escape_string($conn, $_POST['location']);
    $description  = mysqli_real_escape_string($conn, $_POST['description']);

    $logo = $company['logo'];

    if(isset($_FILES['logo']) && $_FILES['logo']['error']==0){

        $ext = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));

        $allowed = ['jpg','jpeg','png','webp'];

        if(in_array($ext,$allowed)){

            if(!empty($company['logo']) && file_exists("../uploads/company/".$company['logo'])){
                unlink("../uploads/company/".$company['logo']);
            }

            $logo = time()."_".$_FILES['logo']['name'];

            move_uploaded_file(
                $_FILES['logo']['tmp_name'],
                "../uploads/company/".$logo
            );
        }
    }

    $sql = "UPDATE companies SET

            company_name='$company_name',
            logo='$logo',
            website='$website',
            email='$email',
            phone='$phone',
            location='$location',
            description='$description'

            WHERE id='$id'";

    if(mysqli_query($conn,$sql)){

        $_SESSION['success']="Company Updated Successfully.";

        header("Location: companies.php");
        exit();

    }else{

        $_SESSION['error']=mysqli_error($conn);

    }

}

include("include/head.php");
?>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h3>Edit Company</h3>
</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Company Name</label>
<input
type="text"
name="company_name"
class="form-control"
value="<?php echo htmlspecialchars($company['company_name']); ?>"
required>
</div>

<div class="mb-3">

<label>Current Logo</label><br>

<?php if($company['logo']!=""){ ?>

<img
src="../uploads/company/<?php echo $company['logo']; ?>"
width="100">

<?php } ?>

</div>

<div class="mb-3">
<label>Change Logo</label>
<input
type="file"
name="logo"
class="form-control">
</div>

<div class="mb-3">
<label>Website</label>
<input
type="url"
name="website"
class="form-control"
value="<?php echo htmlspecialchars($company['website']); ?>">
</div>

<div class="mb-3">
<label>Email</label>
<input
type="email"
name="email"
class="form-control"
value="<?php echo htmlspecialchars($company['email']); ?>">
</div>

<div class="mb-3">
<label>Phone</label>
<input
type="text"
name="phone"
class="form-control"
value="<?php echo htmlspecialchars($company['phone']); ?>">
</div>

<div class="mb-3">
<label>Location</label>
<input
type="text"
name="location"
class="form-control"
value="<?php echo htmlspecialchars($company['location']); ?>">
</div>

<div class="mb-3">
<label>Description</label>
<textarea
name="description"
rows="5"
class="form-control"><?php echo htmlspecialchars($company['description']); ?></textarea>
</div>

<button
type="submit"
name="update_company"
class="btn btn-primary">
Update Company
</button>

<a href="companies.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</div>

</div>

<?php include("include/footer.php"); ?>