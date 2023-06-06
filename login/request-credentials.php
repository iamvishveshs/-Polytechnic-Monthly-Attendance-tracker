<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request form - GPH </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

  <style>
    * {
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    .container {
      padding: 200px;
      padding-top: 0;
    }

    body {
      text-align: center;
      font-family: 'Lato', 'sans-serif';
      font-weight: 400;
    }

    a {
      text-decoration: none;
    }

    .info-text {
      text-align: left;
      width: 100%;
    }

    header,
    form {
      padding: 4em 10%;
    }

    .form-group {
      margin-bottom: 20px;
    }

    h1.heading {
      font-size: 22px;
      text-transform: uppercase;
      font-weight: 300;
      text-align: left;
      color: #506982;
      border-bottom: 1px solid #506982;
      padding-bottom: 3px;
      margin-bottom: 20px;
    }

    .controls {
      text-align: left;
      position: relative;
    }

    .controls input[type="text"],
    .controls input[type="email"],
    .controls input[type="number"],
    .controls input[type="date"],
    .controls input[type="tel"],
    .controls input[type="password"],
    .controls textarea,
    .controls button,
    .controls select {
      padding: 12px;
      font-size: 14px;
      border: 1px solid #c6c6c6;
      width: 100%;
      margin-bottom: 18px;
      font-family: 'Lato', 'sans-serif';
      font-size: 16px;
      font-weight: 300;
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      border-radius: 2px;
      -moz-transition: all 0.3s;
      -o-transition: all 0.3s;
      -webkit-transition: all 0.3s;
      transition: all 0.3s;
    }

    .controls input:focus {
      outline: 1px solid #47b2e4;
    }

    .controls .fa-sort {
      position: absolute;
      right: 10px;
      top: 17px;
      color: #999;
    }

    .controls select {
      -moz-appearance: none;
      -webkit-appearance: none;
      cursor: pointer;
    }

    .controls label.active {
      top: -11px;
      color: #555;
      background-color: white;
      width: auto;
    }

    .controls textarea {
      resize: none;
      height: 200px;
    }

    button {
      cursor: pointer;
      background-color: #1b3d4d;
      border: none;
      color: #fff;
      padding: 12px 0;
      float: right;
    }

    button:hover {
      background-color: #224c60;
    }

    .clear:after {
      content: "";
      display: table;
      clear: both;
    }

    .grid {
      background: white;
    }

    .grid:after {
      /* Or @extend clearfix */
      content: "";
      display: table;
      clear: both;
    }

    [class*='col-'] {
      float: left;
      padding-right: 10px;
    }

    .grid [class*='col-']:last-of-type {
      padding-right: 0;
    }

    .col-2-3 {
      width: 66.66%;
    }

    .col-1-3 {
      width: 33.33%;
    }

    .col-1-2 {
      width: 50%;
    }

    .col-1-4 {
      width: 25%;
    }

    @media (max-width: 760px) {

      .col-1-4-sm,
      .col-1-3,
      .col-2-3 {
        width: 100%;
      }

      [class*='col-'] {
        padding-right: 0px;
      }

      .container {
        padding: 0px;
      }
    }

    .col-1-8 {
      width: 12.5%;
    }
  </style>
</head>

<body>
  <div class="container">
    <form action="requestSubmission.php" method="POST">
      <!--  General -->
      <div class="form-group">
        <h1 class="heading">Credentials request form Government polytechnic hamirpur</h1>
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
          <input type="text" id="phone" name="phone" pattern="[0-9]{10,10}" title="Phone number must be of 10 Digits"
            required>

        </div>
        <div class="controls">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
            required>

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
          <button type="submit" value="Submit" class="col-1-4" name="submit">Submit</button>
        </div>
      </div> <!-- /.form-group -->
    </form>
  </div>

</body>

</html>