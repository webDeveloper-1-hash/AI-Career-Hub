<?php
session_start();
include("../config/connection.php");
include("../include/head.php");

$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Users</h2>
    </div>

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

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>

        </thead>

        <tbody>

        <?php while($row=mysqli_fetch_assoc($result)){ ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo htmlspecialchars($row['fullname']); ?></td>

            <td><?php echo htmlspecialchars($row['email']); ?></td>

            <td>
                <?php
                echo !empty($row['phone'])
                    ? htmlspecialchars($row['phone'])
                    : "N/A";
                ?>
            </td>

            <td>
                <?php if($row['role']=="admin"){ ?>

                    <span class="badge bg-danger">Admin</span>

                <?php }else{ ?>

                    <span class="badge bg-primary">User</span>

                <?php } ?>
            </td>

            <td><?php echo $row['created_at']; ?></td>

            <td>

                <?php if($row['role']!="admin"){ ?>

                <a href="delete_job.php?id=<?php echo $row['id']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this user?')">

                    Delete

                </a>

                <?php }else{ ?>

                    <span class="badge bg-secondary">Protected</span>

                <?php } ?>

            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

