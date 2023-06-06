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

    <title>Update Teacher</title>
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
                                <h6 class="m-0 font-weight-bold text-primary">Update Teacher</h6>
                            </div>
                            <form action="SimpleQueries.php" method="POST">
                                <div class="form-group">
                                    <h1 class="heading">Update Teacher Data</h1>
                                    <div class="controls">
                                        <label for="sname">Teacher Name</label>
                                        <input type="text" id="id" name="id" value="<?php if (isset($_REQUEST['id'])) {
                                                                                        echo $_REQUEST['id'];
                                                                                    } ?>" hidden required>
                                        <input type="text" id="name" name="name" value="<?php if (isset($_REQUEST['name'])) {
                                                                                            echo $_REQUEST['name'];
                                                                                        } ?>" required>
                                    </div>


                                    <div class="controls">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" value="<?php if (isset($_REQUEST['email'])) {
                                                                                                echo $_REQUEST['email'];
                                                                                            } ?>" required>

                                    </div>
                                    <div class="controls">
                                        <label for="phone">Phone number</label>
                                        <input type="text" id="phone" name="phone" pattern="[0-9]{10,10}" title="Phone number must be of 10 Digits" value="<?php if (isset($_REQUEST['phone'])) {
                                                                                                                                                                echo $_REQUEST['phone'];
                                                                                                                                                            } ?>" required>
                                    </div>
                                    <div class="controls">
                                        <label for="designation">Designation</label>
                                        <input type="text" id="designation" name="designation" value="<?php if (isset($_REQUEST['designation'])) {
                                                                                                            echo $_REQUEST['designation'];
                                                                                                        } ?>" required>
                                    </div>
                                    <div class="controls">
                                        <label for="department">Department</label>
                                        <select name="department" required>
                                            <?php
                                            if (isset($_REQUEST['department'])) {
                                            ?>
                                                <option value="applied science" <?php if ($_REQUEST['department'] == "applied science") {
                                                                                    echo "selected";
                                                                                } ?>>Applied Science</option>
                                                <option value="computer" <?php if ($_REQUEST['department'] == "computer") {
                                                                                echo "selected";
                                                                            } ?>>Computer</option>
                                                <option value="civil" <?php if ($_REQUEST['department'] == "civil") {
                                                                            echo "selected";
                                                                        } ?>>Civil</option>
                                                <option value="electrical" <?php if ($_REQUEST['department'] == "electrical") {
                                                                                echo "selected";
                                                                            } ?>>Electrical</option>
                                                <option value="mechanical" <?php if ($_REQUEST['department'] == "mechanical") {
                                                                                echo "selected";
                                                                            } ?>>Mechanical</option>
                                                <option value="it" <?php if ($_REQUEST['department'] == "it") {
                                                                        echo "selected";
                                                                    } ?>>IT</option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </div>

                                    <div class="grid">
                                        <button type="submit" value="Submit" class="col-1-4" name="UpdateTeacher">Submit</button>
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