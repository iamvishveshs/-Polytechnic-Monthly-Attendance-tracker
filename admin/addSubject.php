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

    <title>Add subject</title>
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
                                <h6 class="m-0 font-weight-bold text-primary">Add Subject</h6>
                            </div>
                            <!-- Data of this form is sent to ""(queries.php)"" page Where (name="addSubject")-->
                            <form action="queries.php" method="POST">
                                <div class="form-group">
                                    <h1 class="heading">Add new subject</h1>
                                    <div class="controls">
                                        <label for="sname">Subject Name</label>
                                        <input type="text" id="sname" name="sname" required>
                                    </div>
                                    <div class="controls">
                                        <label for="scheme">Scheme</label>
                                        <input type="text" id="scheme" name="scheme" required>
                                    </div>
                                    <div class="controls">
                                        <label for="type">Type</label>
                                        <select name="type" required>
                                            <option value="theory">Theory</option>
                                            <option value="practical">Practical</option>
                                        </select>
                                    </div>
                                    <div class="controls">
                                        <label for="sem">Semester</label>
                                        <select name="sem" required>
                                            <option value="1">1<sup>st</sup></option>
                                            <option value="2">2<sup>nd</sup></option>
                                            <option value="3">3<sup>rd</sup></option>
                                            <option value="4">4<sup>th</sup></option>
                                            <option value="5">5<sup>th</sup></option>
                                            <option value="6">6<sup>th</sup></option>
                                        </select>
                                    </div>
                                    <div class="grid">
                                        <button type="submit" value="Submit" class="col-1-4"
                                            name="addSubject">Submit</button>
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