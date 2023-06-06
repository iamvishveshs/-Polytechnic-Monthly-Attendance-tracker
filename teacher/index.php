<?php
require("check.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher - Dashboard</title>
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
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <div class="card  shadow col-xl-12 col-md-12 mb-4 py-5">
                            <h3 class="mb-3">Teacher Priviledges</h3>
                            <ul class="text-left">
                                <li>
                                    <p>You can add Attendance by <a href="./addAttendance.php"
                                            class="text-primary">clicking
                                            Here</a> to the subjects which are assigned to
                                        you.</p>
                                </li>
                                <li>
                                    <p>You can update and view Attendance by <a href="./getAttendance.php"
                                            class="text-primary">clicking Here</a> of the subjects which are assigned to
                                        you and you have saved the attendance of students according to subject.</p>
                                </li>
                            </ul>

                            <!-- Content Row -->
                        </div>




                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Monthly Attendance Tracker |
                                <?php echo date("Y"); ?>
                            </span>
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