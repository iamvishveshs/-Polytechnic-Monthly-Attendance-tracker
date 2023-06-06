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

    <title>Appoint Class Teachers</title>
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
                                <h6 class="m-0 font-weight-bold text-primary">Appoint as Class Teacher</h6>
                            </div>
                            <!-- Data of this form is sent to ""(queries.php)"" page Where (name="appointClassTeacher")-->
                            <form action="queries.php" method="POST">
                                <div class="controls">
                                    <label for="teacher">Teacher</label>
                                    <select name="teacher" id="teacher" required>
                                        <option value="" selected>Select Teacher</option>
                                        <?php
                                        $teacherListQuery = "SELECT * FROM `user` WHERE `role`!='admin'";
                                        if ($teacherListResult = mysqli_query($conn, $teacherListQuery)) {
                                            while ($teacherListRow = mysqli_fetch_assoc($teacherListResult)) {

                                        ?>
                                                <option value="<?php echo $teacherListRow['id']; ?>"><?php echo $teacherListRow['name']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="controls">
                                    <label for="sem">Semester</label>
                                    <select name="sem" required>
                                        <?php
                                        $semQuery = "SELECT * FROM `class_teacher` WHERE `teacher_id` IS NULL";
                                        if ($semResult = mysqli_query($conn, $semQuery)) {
                                            while ($semRow = mysqli_fetch_assoc($semResult)) {

                                        ?>
                                                <option value="<?php echo $semRow['sem']; ?>"><?php echo $semRow['sem']; ?>
                                                </option>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <option value="">
                                                <?php echo "Class Teachers are already assigned to every semester"; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="controls">
                                    <button type="submit" value="Submit" class="btn btn-primary" name="appointClassTeacher">Appoint as Class Teacher</button>
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