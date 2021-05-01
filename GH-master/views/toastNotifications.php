<link rel="stylesheet" href="<?php echo (GameHeaven) ?>/views/assets/toast/Toast.min.css">
<script src="<?php echo (GameHeaven) ?>/views/assets/toast/Toast.min.js"></script>


<?php
include 'errorsHandler.php';

if ($err!=null) {
?>
    <script>
        new Toast({
            message: '<?php echo ($err); ?>',
            type: 'danger'
        });
    </script>

<?php

}

?>


<?php
if ($succ!=null) {
?>
    <script>
        new Toast({
            message: '<?php echo ($succ); ?>',
            type: 'success'
        });
    </script>

<?php

}

?>