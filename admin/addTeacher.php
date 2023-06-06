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

  <title>Add Teacher</title>
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
                <h6 class="m-0 font-weight-bold text-primary">Add Teacher</h6>
              </div>
              <!-- Data of this form is sent to ""(queries.php)"" page Where (name="addTeacher")-->
              <form action="queries.php" method="POST">
                <div class="form-group">
                  <h1 class="heading">Add new teacher</h1>
                  <div class="controls">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>

                  </div>
                  <div class="controls">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>

                  </div>
                  <div class="controls">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" pattern="[0-9]{10,10}" title="Phone number must be of 10 Digits" required>

                  </div>
                  <div class="controls">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>

                  </div>
                  <div class="controls">
                    <label for="designation">designation</label>
                    <input type="text" id="designation" name="designation" required>

                  </div>
                </div>
                <!--  Details -->
                <div class="form-group">

                  <div class="grid">
                    <div class="col-1-3 col-1-3-sm">
                      <div class="controls">
                        <label for="department">Department</label>
                        <select name="department" required>
                          <option value="" selected></option>
                          <option value="applied science">Applied Science</option>
                          <option value="computer">Computer</option>
                          <option value="civil">Civil</option>
                          <option value="electrical">Electrical</option>
                          <option value="mechanical">Mechanical</option>
                          <option value="it">IT</option>
                        </select>

                      </div>
                    </div>

                  </div>
                  <div class="grid">
                    <button type="submit" value="Submit" class="col-1-4" name="addTeacher">Save Teacher</button>
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