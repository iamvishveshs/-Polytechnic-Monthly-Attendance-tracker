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
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css"
        rel="stylesheet" />

    <title>Attendance -GPH</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,
        td {
            white-space: wrap;
            font-size: 0.7em;
        }

        td {
            white-space: nowrap;
            font-size: 0.7em;
        }

        div.dataTables_wrapper {
            margin: 0 auto;
        }

        div.container {
            width: 80%;
        }

        .low {
            background-color: #A9A9A9;
            color: white;
            font-weight: bold;
        }

        table.dataTable tbody td {
            vertical-align: top;

        }
    </style>
    <?php require("styles.php"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Scripts for generating attendance on the basis of the choice of the applicant-->
    <script type="text/javascript">
        function showAttendance() {
            $(document).ready(function () {
                var a = $("#sem").val();
                var divide = $("#divide").val();
                var name = "showAttendance";
                $.ajax({
                    url: 'ajaxQueries.php',
                    type: 'POST',
                    data: {
                        sem: a,
                        divide: divide,
                        name: name
                    },
                    success: function (response) {
                        $("#studentsData").html(response);
                    }
                });
            });
        }
    </script>
    <script>
        
        function printDiv() {
            //Getting the parent element of tables
            var divContents = document.getElementById("printable").innerHTML;
            //Openning a new window of broser of specific size
            var a = window.open('', '', 'height=500, width=500');
            //.write() method is used to include the contents in new window
            a.document.write(
                '<html><head><link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"><style>table{border-collapse: collapse;}th, td { white-space: wrap;font-size: 0.7em;}td {white-space: nowrap;font-size: 1em;}.low{background-color: #cccccc;font-weight: bold;}table{border-collapse:collapse;text-align:center;margin-inline:auto;margin-bottom:50px;}.center{align-items:center;text-align:center;}@media print{.page-break{ display:block; page-break-before:always; }}</style></head>'
            );
            a.document.write('<body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            //Closing adding the contents in opened window
            a.document.close();
            //printing the new window
            a.print();
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

                        <!-- Attendance form card -->
                        <div class="card border-left-info shadow mb-4 col-xl-12 col-md-12 mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Get Attendance</h6>
                            </div>
                            <!-- form data will be sent using jquery to ajaxQueries page -->
                            <form>
                                <div class="controls">
                                    <!--  Field to get the no. of students in first group -->
                                    <label for="divide">No. of students in first Group</label>
                                    <input type="text" name="divide" id="divide" value="25" required>
                                </div>
                                <div class="controls">
                                    <label for="sem">Semester</label>
                                    <select name="sem" id="sem" required>

                                        <?php
                                        //Getting logged in teacher's id from session variable created at the time of login
                                        $teacher_id = $_SESSION['CteacherId'];
                                        //Getting semsters where the teacher is class teacher
                                        $semQuery = "SELECT * FROM `class_teacher` WHERE teacher_id=" . $teacher_id . "";
                                        if ($semResult = mysqli_query($conn, $semQuery)) {
                                            //Fetching data from query
                                            while ($semRow = mysqli_fetch_assoc($semResult)) {
                                                //generating semester options for class teacher to get the attendance of
                                                ?>

                                                <option value="<?php echo $semRow['sem']; ?>"><?php echo $semRow['sem']; ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="controls">
                                    <!-- Button to show attendance on click -->
                                    <a class="btn btn-primary" onclick="showAttendance()">Show Attendance</a>
                                </div>
                                <div id="studentsData">
                                    <!-- Data of attendance is shown here -->
                                    <!-- -->
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

</body>

</html>