
<?php
$this->_t = "Verifying User";

?>
<h1 style="color: white;"><?php echo($response ?? ""); ?></h1>


<div class="row register-form" style="margin-right: 0;margin-left:20%;">
        <div class="col-md-8 offset-md-2">
            <button type="button" onclick="showVerify();">Enter code</button>
            <button type="button" onclick="showResend();">Resend email</button>
        </div>
</div>

<div class="row register-form" style="margin-right: 0;margin-left: 0;" id="verify">
        <div class="col-md-8 offset-md-2">
            <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data" id="addGameForm" onsubmit="return send();">



                <h1 style="color: rgb(255,255,255);">Enter code manually</h1>
                <div class="col-sm-10 input-column">
                <input class="form-control" type="text" name="verCode" required placeholder="Verification code" style="margin-left: 10%;text-align: center;"></div>
                <button class="btn btn-danger submit-button" id="submit" type="submit" name="verifyAccounts" >Verify Account</button>

            </form>
        </div>
</div>


<div class="row register-form" style="margin-right: 0;margin-left: 0;" id="resend_code">
        <div class="col-md-8 offset-md-2">
            <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data" id="addGameForm" onsubmit="return send();">



                <h1 style="color: rgb(255,255,255);">Resend verification email</h1>
                <div class="col-sm-10 input-column">
                <input class="form-control" type="email" name="email" required placeholder="Email" style="margin-left: 10%;text-align: center;"></div>
                <button class="btn btn-danger submit-button" id="submit" type="submit" name="resendCode" >Send code</button>

            </form>
        </div>
</div>


<script>

    function showVerify(){
        $("#verify").show(1000);
        $("#resend_code").hide(1000);
    }

    
    function showResend(){
        $("#verify").hide(1000);
        $("#resend_code").show(1000);
    }
    showVerify();
</script>