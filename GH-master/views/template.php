<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?=$t ?></title>

    <?php require("Links.php") ?>

</head>


<body style="overflow: hidden;">

    <div id="loader" style="position:absolute; width:100%;height:100%; background-color: black; color:white; z-index:999"> 
    <div class="spinner-border text-warning" style="position: absolute; left:50%; top:50%;" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div>
    <?php include ('Header.php');
        include ('toastNotifications.php');
    ?>

    
    
    <?= $content ?>
    

    <?php include ('Footer.php');?>


    <script>
        window.scrollTo(0, 0);
        $(document).ready(function(){
           
            $("#loader").fadeOut(1000);
            $("body").css("overflow", "auto");
        });
    </script>
</body>
</html>