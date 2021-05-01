
<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- Custom fonts for this template-->
<link href="<?=AdminPanel ?>views/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?=AdminPanel ?>views/assets/css/sb-admin-2.min.css" rel="stylesheet">
<link href="<?=AdminPanel ?>views/assets/toast/Toast.min.css" rel="stylesheet">
<link href="<?=AdminPanel ?>views/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="<?=AdminPanel ?>views/assets/toast/Toast.min.js"></script>
<title>Game heaven admin login</title>
</head>
<body>

<?php
if (isset($_SESSION["errLogin"])) {
?>
    <script>
        new Toast({
            message: '<?php echo ($_SESSION["errLogin"]); ?>',
            type: 'danger'
        });
    </script>
<?php
unset($_SESSION["errLogin"]);
}

?>

<?php
if (isset($_SESSION["resetAdmin"])) {
?>
    <script>
        new Toast({
            message: '<?php echo ($_SESSION["resetAdmin"]); ?>',
            type: 'success'
        });
    </script>
<?php
unset($_SESSION["resetAdmin"]);
}

?>

<?php
if (isset($_SESSION["resetError"])) {
?>
    <script>
        new Toast({
            message: '<?php echo ($_SESSION["resetError"]); ?>',
            type: 'danger'
        });
    </script>
<?php
unset($_SESSION["resetError"]);
}

?>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Gameheaven Admin Panel Login!</h1>
                                </div>
                                <form class="user" action="" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pass" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Secret Code" name="code" required>
                                    </div>

                                    <button type="submit" name="loginAdmin" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>


                                </form>
                                <hr>
                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#resetPasswordModal" style="width: 100%">
                                    Forgot Password
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>




<div class="modal fade" tabindex="-1" role="dialog" id="resetPasswordModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Password Reset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="resetAdminPass">Send Reset Email</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>







<!-- Bootstrap core JavaScript-->
<script src="<?=AdminPanel?>views/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=AdminPanel?>views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=AdminPanel?>views/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=AdminPanel?>views/assets/js/sb-admin-2.min.js"></script>