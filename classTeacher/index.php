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

    <title>Class Teacher - Dashboard</title>
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="card  shadow col-xl-12 col-md-12 mb-4 py-5">
                            <h3 class="mb-3">Class Teacher Priviledges</h3>
                            <ul class="text-left">
                                <li>
                                    <p>You can View and update students data by <a href="./student.php"
                                            class="text-primary">clicking
                                            Here</a> of the semester(s) which are assigned to
                                        you.</p>
                                </li>
                                <li>
                                    <p>You can <span class="text-info">view</span> the Attendance and <span class="text-info">generate attendance report</span> by <a href="./getAttendance.php"
                                            class="text-primary">clicking Here</a> of the semester which are assigned to
                                        you and you have to divide the class into 2 groups by entering the no of students in first group.</p>
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