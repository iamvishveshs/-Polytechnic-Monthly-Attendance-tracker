<?php
require("check.php");
$id=$_SESSION['adminId'];
if(isset($_POST['UpdatePassword']))
{
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
    if(mysqli_query($conn,"UPDATE `user` SET `email`='$email',`password`='$password'  WHERE id='$id'"))
    {
        header("Location:./updateDetails.php?alert=succ");
    }
    else
    {
        header("Location:./updateDetails.php?alert=fail");   
    }

}
$sql=mysqli_query($conn,"SELECT * FROM `user` WHERE id='$id'");
$row=mysqli_fetch_assoc($sql);
if(isset($row))
{


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Details</title>
    <?php require("styles.php"); ?>

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require("sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require("topbar.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid ">
                    <div class="row">

                        <!-- Basic Card Example -->
                        <div class="card border-left-info shadow mb-4 col-xl-12 col-md-12 mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Update Details</h6>
                            </div>
                            <?php
                            if(isset($_REQUEST['alert']) && $_REQUEST['alert']=="succ")
                            {
                                ?>
                                <div class="alert alert-success mt-3">
                                    <b>Data updated successfully.</b>
                                </div>
                                <?php
                            }
                            else if(isset($_REQUEST['alert']) && $_REQUEST['alert']=="fail")
                            {
                                ?>
                                <div class="alert alert-danger mt-3">
                                    <b>Error while updating data.</b>
                                </div>
                                <?php
                            }
                            ?>
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="form-group">
                                    <h1 class="heading">Update Your Details</h1>
                                    <div class="controls">
                                        <label for="email">Email ID</label>
                                        <input type="email" id="email" name="email" value="<?php 
                                                                                        echo $row['email'];
                                                                                        ?>" required>
                                    </div>
                                    <div class="controls">
                                        <label for="password">Password</label>
                                        <input type="text" id="password" name="password" placeholder="Enter new password" required>
                                    </div>


                                  
                                    <div class="grid">
                                        <button type="submit" value="Submit" class="col-1-4" name="UpdatePassword">Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Monthly Attendance Tracker | <?php echo date("Y"); ?></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <?php require("scripts.php"); ?>



</body>

</html>
<?php
}
?>