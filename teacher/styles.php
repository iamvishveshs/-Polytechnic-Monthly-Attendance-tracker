<!-- Custom fonts for this template -->
<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../assets/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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