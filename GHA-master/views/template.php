<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="<?php echo (AdminPanel); ?>views/assets/img/logo.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $t ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= AdminPanel ?>views/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= AdminPanel ?>views/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= AdminPanel ?>views/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
  <script src="<?= AdminPanel ?>views/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= AdminPanel ?>views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= AdminPanel ?>views/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->

</head>

<body>

  <?php include('topbar.php'); ?>


  <div class="container-fluid">
    <div id="pageContainer"><?= $content ?></div>



    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; GameHeaven 2020</span>
        </div>
      </div>
    </footer>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>




  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>



</body>

</html>