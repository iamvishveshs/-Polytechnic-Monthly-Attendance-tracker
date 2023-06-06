<?php
require("check.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Subjects -GPH</title>

    <?php require("styles.php"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Scripts for generating option for " subjects " on the basis of sem and scheme-->
    <script type="text/javascript">
        function loadSubject() {
            $(document).ready(function() {
                var a = $("#sem").val();
                var b = $("#scheme").val();
                $.ajax({
                    url: 'ajaxQueries.php',
                    type: 'POST',
                    data: {
                        sem: a,
                        scheme: b
                    },
                    success: function(response) {
                        $("#subject").html(response);
                    }
                });
            });
        }
    </script>

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
                    <div class="row">

                        <!-- Basic Card Example -->
                        <div class="card border-left-info shadow mb-4 col-xl-12 col-md-12 mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Create Table</h6>
                            </div>
                            <!--form data is sent to createTable.php with name attribute name="createTable"-->
                            <form action="createTable.php" method="post">
                                <div class="controls">
                                    <label for="sem">Semester</label>
                                    <select name="sem" id="sem" required>
                                        <option value="1">1<sup>st</sup></option>
                                        <option value="2">2<sup>nd</sup></option>
                                        <option value="3">3<sup>rd</sup></option>
                                        <option value="4">4<sup>th</sup></option>
                                        <option value="5">5<sup>th</sup></option>
                                        <option value="6">6<sup>th</sup></option>
                                    </select>
                                </div>
                                <div class="controls">
                                    <label for="scheme">Scheme</label>
                                    <select name="scheme" id="scheme" required>
                                        <?php
                                        /*Selecting only different schemes from subject table*/
                                        $schemeQuery = "SELECT DISTINCT scheme FROM `subject`";
                                        if ($schemeResult = mysqli_query($conn, $schemeQuery)) {
                                            while ($schemeRow = mysqli_fetch_assoc($schemeResult)) {

                                        ?>
                                                <!--Appending the scheme into the <option>-->
                                                <option value="<?php echo $schemeRow['scheme']; ?>"><?php echo $schemeRow['scheme']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="controls">
                                    <!--Onclick load the subjects from ajaQueries.php-->
                                    <a class="btn btn-primary" onclick="loadSubject()">Click to load subjects</a>
                                </div>

                                <div>
                                </div>


                                <div class="controls">

                                    <div id="subject">
                                    </div>

                                </div>

                                <div class="controls">
                                    <button type="submit" name="createTable" class="btn btn-primary">Create
                                        Table</button>
                                </div>

                            </form>


                        </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">

                    <!-- Logout Modal-->


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
        <?php require("toast.php"); ?>
</body>

</html>