


<?php 
include 'toastNotifications.php';

if(isset($currentPublisher)){
    $this->_t  = $currentPublisher->publisher_name;
    ?>
    
    
<div class="row register-form">
        <div class="col-md-11">
            <form class="custom-form" style="background-color: rgba(255,255,255,0);" method="post" name="editPublisher" enctype="multipart/form-data">
                <h1 style="color: rgb(255,255,255);">Edit your publisher profile</h1>
                <div class="form-row form-group align-items-center justify-content-center">
                    <div class="" style="font-size: 20px;"><button type="button" class="btn-primary-dark"  data-toggle="modal" data-target="#optOutModal"><i class="fas fa-sign-out-alt"></i> Unregister as publisher</button></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name" style="color: rgb(255,255,255);">Name</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="name" required="" value="<?=$currentPublisher->publisher_name; ?>"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email" style="color: rgb(255,255,255);">Email </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="email" name="email" required="" value="<?=$currentPublisher->publisher_email; ?>"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="website" style="color: rgb(255,255,255);">Website link</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="website" required="" value="<?=$currentPublisher->publisher_website; ?>"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="facebook" style="color: rgb(255,255,255);">Facebook link</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="facebook" value="<?=$currentPublisher->publisher_facebook; ?>"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="youtube" style="color: rgb(255,255,255);">Youtube link</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="youtube" value="<?=$currentPublisher->publisher_youtube; ?>"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="twitch" style="color: rgb(255,255,255);">Twitch link</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="twitch" value="<?=$currentPublisher->publisher_twitch; ?>"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="twitter" style="color: rgb(255,255,255);">Twitter link</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="twitter" value="<?=$currentPublisher->publisher_twitter; ?>"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field" style="color: rgb(255,255,255);">Logo</label></div>
                    <div class="col-sm-4 input-column"><input type="file" id="imgInp" name="pubLogo"></div>
                    <div class="col input-column"><img id="imgPrvw" class="rounded-circle" src="<?=GameHeaven."publishers/$currentPublisher->publisher_id/$currentPublisher->publisher_id.jpg" ?>" width="200px"></div>
                </div><button class="btn btn-danger submit-button" type="submit" name="editPublisher">Submit Form</button></form>
        </div>
    </div>
    



    <div class="modal fade" id="optOutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Opt out as a publisher !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete your publisher account ? , all games and related data will be removed permanently and cannot be restored
      </div>
      <div class="modal-footer">
          <form method="POST" action="" enctype="multipart/form-data">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        <button type="submit" name="optOutPublisher" class="btn btn-danger">Opt Out</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <?php
}else{
        $this->_t="Become publisher";
    ?>
    
    
    
    
    
<div class="row register-form">
        <div class="col-md-11">
            <form class="custom-form" style="background-color: rgba(255,255,255,0);" method="post" name="becomePublisher" enctype="multipart/form-data">
                <h1 style="color: rgb(255,255,255);">Become a publisher</h1>
                <div style="color: white;">
                <p class="lead">
                * Required fields
                </p>   
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name" style="color: rgb(255,255,255);">Name*</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="name" required="" placeholder="Your publisher name"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email" style="color: rgb(255,255,255);">Email*</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="email" name="email" required="" placeholder="Your publisher email"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="website" style="color: rgb(255,255,255);">Website link*</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="website" required="" placeholder="Your website link"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="facebook" style="color: rgb(255,255,255);">Facebook link</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="facebook" placeholder="Your facebook page link"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="youtube" style="color: rgb(255,255,255);">Youtube link</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="youtube" placeholder="Your YouTube channel link"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="twitch" style="color: rgb(255,255,255);">Twitch link</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="twitch" placeholder="Your Twitch account link"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="twitter" style="color: rgb(255,255,255);">Twitter link</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="twitter" placeholder="Your Twitter account link"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field" style="color: rgb(255,255,255);">Logo*</label></div>
                    <div class="col-sm-4 input-column"><input type="file" id="imgInp" required="" name="pubLogo"></div>
                    <div class="col input-column"><img id="imgPrvw" class="rounded-circle" src="<?=GameHeaven ?>views/assets/img/300.png" width="200px"></div>
                </div><button class="btn btn-danger submit-button" type="submit" name="becomePublisher">Submit Form</button>
                
               
                <div style="color: white;">
                <p class="lead">
                By signing up you agree to our terms of service and privacy policy
                </p>    
                
                </div>
                
            </form>
        </div>
    </div>
    
    
    
    
    
    
    <?php
}

?>

