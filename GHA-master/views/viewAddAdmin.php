
<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$this->_t ="Add An Admin"

?>


<link href="<?=AdminPanel ?>views/assets/toast/Toast.min.css" rel="stylesheet">
<script src="<?=AdminPanel ?>views/assets/toast/Toast.min.js"></script>



<?php
if (isset($_SESSION["errAddAdmin"])) {
?>
    <script>
        new Toast({
            message: '<?php echo ($_SESSION["errAddAdmin"]); ?>',
            type: 'danger'
        });
    </script>
<?php
unset($_SESSION["errAddAdmin"]);
}

?>






<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Add An Admin</h1>
                    </div>
                    <form class="user" action="" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="fname" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="lname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email" required>
                        </div>
                        <div class="form-group">
                            
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pass" required>
                            
                            
                        </div>

                        <div class="form-group">
                           
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Secret Code" name="code" required>
                          
                        </div>

                        <button type="submit" name="addAdmin" class="btn btn-primary btn-user btn-block">
                            Add Admin
                        </button>
                        <hr>


                    </form>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>