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

    <title>Add Attendance -GPH</title>

    <?php require("styles.php"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        function loadSubject() {
            $(document).ready(function () {
                var a = $("#sem").val();//Getting semester
                var b = $("#scheme").val();//Getting scheme
                var name = "ShowSubjects";
                $.ajax({//Sending request
                    url: 'ajaxQueries.php',
                    type: 'POST',
                    data: { sem: a, scheme: b, name: name },
                    success: function (response) {
                        //response if the request is successful
                        $("#subject").html(response);
                    }
                });
            });
        }
        function showStudents() {
            $(document).ready(function () {
                var a = $("#sem").val();//Getting semester
                var b = $("#scheme").val();//Getting scheme
                var c = $("#subject").val();//Getting subject id
                var d = $("#total").val();//Getting maximum number of classes taken
                var name = "addAttendance";
                $.ajax({
                    url: 'ajaxQueries.php',
                    type: 'POST',
                    data: { sem: a, scheme: b, subject: c, total: d, name: name },
                    success: function (response) {
                        $("#studentsData").html(response);
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
                                <h6 class="m-0 font-weight-bold text-primary">Add Attendance</h6>
                            </div>
                            <form action="saveAttendance.php" method="POST">
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
                                        /*Extracting Only different values of scheme */
                                        $schemeQuery = "SELECT DISTINCT scheme FROM `subject`";
                                        if ($schemeResult = mysqli_query($conn, $schemeQuery)) {
                                            while ($schemeRow = mysqli_fetch_assoc($schemeResult)) {

                                                ?>
                                                <option value="<?php echo $schemeRow['scheme']; ?>"><?php echo $schemeRow['scheme']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="controls">
                                    <a class="btn btn-primary" onclick="loadSubject()">Click to load subjects</a>
                                </div>
                                <div class="controls">
                                    <label for="subject">Subject</label>
                                    <select name="subject" id="subject" required>
                                    </select>
                                </div>
                                <div class="controls">
                                    <label for="total">Total classes</label>
                                    <input name="total" id="total" required>
                                </div>
                                <div class="controls">
                                    <a class="btn btn-primary" onclick="showStudents()">Show students</a>
                                </div>
                                <div id="studentsData">
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
        <script type="text/javascript">
        function check(id) {
            var classes = document.getElementsByClassName("classes"+id+"")[0].value;
            var attended = document.getElementsByClassName("attended"+id+"")[0].value;
            var alert = document.getElementsByClassName("alert"+id+"")[0];
            if(attended>classes)
            {
                alert.innerText="Attended classes can't be greater than total classes";
            }
            else{
                alert.innerText="";
            }
            
        }
    </script>
</body>

</html>