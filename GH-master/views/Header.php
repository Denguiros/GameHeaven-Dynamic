<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    ?>



<input type="hidden" value="<?= GameHeaven ?>" id="siteName">

<div>

    <div class="header-blue" style="padding-bottom: 0;">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
            <div class="container-fluid">
                <a href="<?php echo (GameHeaven); ?>">
                    <img src="<?php echo (GameHeaven); ?>/views/assets/img/logo.png" style="width: 3em;margin-right: 0.5em;">
                </a>
                <a class="navbar-brand" href="<?php echo (GameHeaven); ?>">GameHeaven</a>
                
                
                <?php 
                    $i = rand(1,4);
                ?>
                <a href="<?php echo (GameHeaven); ?>Retroheaven">
                    <img src="<?php echo (GameHeaven); ?>/views/assets/retroheaven/icons/<?=$i ?>.gif" class="rounded" style="width: 3em;margin-right: 0.5em;">
                </a>
                <a class="navbar-brand" href="<?php echo (GameHeaven); ?>Retroheaven">Retro Heaven</a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation">
                            <!-- ROWS -->
                            <div class="dropdown">
                                <button class="dropdown-toggle" style="color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Browse
                                </button>
                                <div class="dropdown-menu dropdown-multicol slideIn" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-row">
                                        <a class="dropdown-header" style="color:#ff0000;font-weight:bold" href="<?= GameHeaven . 'browse' ?>"> General </a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/price=0">Free to Play</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/vr=1">VR</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/controller-friendly=1">Controller Friendly</a>
                                    </div>
                                    <hr>
                                    <div class="dropdown-row">
                                        <a class="dropdown-header" style="color:red;font-weight:bold"> Game Genres </a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/action=1">Action</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/adventure=1">Adventure</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/platformer=1">Platformer</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/shooter=1">Shooter</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/stealth=1">Stealth</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/survival=1">Survival</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/battle-royale=1">Battle Royale</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/rpg=1">RPG</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/first=1">First-person</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/simulation=1">Simulation</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/vehicle=1">Vehicle</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/strategy=1">Strategy</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/tower-defense=1">Tower defense</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/turn-based=1">Turn-based</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/sports=1">Sports</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/racing=1">Racing</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/mmo=1">MMO</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/board=1">Board</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/card=1">Card</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/casual=1">Casual</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/idle=1">Idle</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/logic=1">Logic</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/sandbox=1">Sandbox</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/open-world=1">Open world</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/puzzle=1">Puzzle</a>
                                        <a class="dropdown-item" href="<?= GameHeaven ?>browse/indie=1">Indie</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline mr-auto" target="_self" id="searchBar">
                        <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="autocomplete" name="search" placeholder="Search"></div>

                    </form>

                    <?php if (isset($_SESSION["user"])) { ?>

                        <button id="cartButton" type="submit" data-toggle="modal" data-target="#cartModal" style="color: red; margin-right:1rem;" name="getCart"><i class="fa fa-shopping-cart"></i></button>
                        <div class="dropdown">
                            <?php if ($_SESSION["user"]->user_profile_picture != null) {
                            ?>
                                <img class="rounded-circle" width="50px" src="<?= GameHeaven . "users/" . $_SESSION["user"]->user_id . "/" . $_SESSION["user"]->user_profile_picture ?>">
                            <?php
                            } else {
                            ?>

                                <img class="rounded-circle" width="50px" src="<?= GameHeaven ?>views/assets/img/unknown_user.jpg">

                            <?php
                            } ?>

                            <a class="btn btn-dark dropdown-toggle" style="font-size:18px; " role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo ($_SESSION["user"]->user_username); ?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= GameHeaven ?>Profile" title="View all your games in one place">Profile</a>
                                <a class="dropdown-item" href="<?= GameHeaven ?>EditProfile" title="Edit your profile settings">Profile settings</a>
                                <?php if (isset($_SESSION["publisher"])) {
                                ?>
                                    <div class="dropdown">
                                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Publisher tools
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php
                                                if($_SESSION["publisher"]->isVerified())
                                                {
                                            ?>
                                            <a class="dropdown-item" href="<?= GameHeaven . "Publisher/" . $_SESSION["publisher"]->publisher_id ?>">View page</a>
                                            <?php
                                            }
                                            else
                                            {?>
                                            <a class="dropdown-item" onclick="notVerified()">View page</a>
                                            <?php
                                            }
                                            ?>
                                            <a class="dropdown-item" href="<?= GameHeaven ?>Publisherforms">Edit profile</a>
                                            <?php
                                                if($_SESSION["publisher"]->isVerified())
                                                {
                                            ?>
                                            <a class="dropdown-item" href="<?= GameHeaven ?>AddGame">Publish a game</a>
                                            <?php
                                            }
                                            else
                                            {?>
                                            
                                                <a class="dropdown-item" onclick="notVerified()">Publish a game</a>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <a class="dropdown-item" href="<?= GameHeaven ?>Publisherforms" title="Become a publisher">Become a publisher</a>

                                <?php
                                } ?>



                                <form name="logout" action="" method="POST" style="width: auto">
                                    <button type="submit" name="logout" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <span class="navbar-text"> <a class="login" data-toggle="modal" data-target="#modalLoginForm">Log In</a>
                        </span><a class="btn action-button" role="button" href="#" data-toggle="modal" data-target="#modalRegisterForm">Sign Up</a>

                    <?php
                    } ?>
                </div>
            </div>
        </nav>
    </div>
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" id="cartBody">

            </div>
        </div>
    </div>


    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Log in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="" method="POST" name="login" id="login">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" name="email" id="email" class="form-control validate" required placeholder="Your e-mail">
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" name="pass" id="password" class="form-control validate" required placeholder="Your password">

                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-danger" type="submit" name="login">Login</button>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-danger" type="button" onclick="resetPassModal()" >Forgot Password ?</button>
                    </div>
                    

                </form>
            </div>
        </div>
    </div>











    <div class="modal fade" id="modalForgotPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Reset Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="" method="POST" id="login">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" name="email" id="email" class="form-control validate" required placeholder="Your e-mail">
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-danger" type="submit" name="ResetPass">Reset Password</button>
                    </div>


                </form>
            </div>
        </div>
    </div>







    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="" name="register">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" name="un" id="orangeForm-name" class="form-control validate" required minlength="5" placeholder="Your username">
                        </div>
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" name="email" id="orangeForm-email" class="form-control validate" required placeholder="Your email">
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" name="pass" id="orangeForm-pass" class="form-control validate" required placeholder="Your password">
                        </div>
                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" name="confirmPass" id="orangeForm-pass" class="form-control validate" required placeholder="Confirm your password">
                        </div>

                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-danger" name="register" type="submit">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






<!-- Modal: modalPoll -->
<div class="modal fade right" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Feedback request
                </p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

            <form id="report" method="POST">


                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>
                        <p>
                            <strong>Your opinion matters</strong>
                        </p>
                        <p>REPORT THIS PRODUCT<br>
                            <strong>Please choose a reason why you are reporting this product .</strong>
                        </p>
                    </div>

                    <hr>

                    <!-- Radio -->

                    <div class="form-check mb-4">
                        <input class="form-check-input" name="reason" type="radio" id="radio-179" value="Legal Violation" checked>
                        <label class="form-check-label" for="radio-179">Legal Violation</label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" name="reason" type="radio" id="radio-279" value="Defarmatory">
                        <label class="form-check-label" for="radio-279">Defarmatory</label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" name="reason" type="radio" id="radio-379" value="Fraud">
                        <label class="form-check-label" for="radio-379">Fraud</label>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" name="reason" type="radio" id="radio-479" value="Harmful">
                        <label class="form-check-label" for="radio-479">Harmful</label>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" name="reason" type="radio" id="radio-579" value="Child Exploitation">
                        <label class="form-check-label" for="radio-579">Child Exploitation</label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" name="reason" type="radio" id="radio-679" value="Adult Content">
                        <label class="form-check-label" for="radio-679">Adult Content</label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" name="reason" type="radio" id="radio-779" value="Broken">
                        <label class="form-check-label" for="radio-779">Broken</label>
                    </div>
                    <!-- Radio -->

                    <p class="text-center">
                        <strong>Additional information</strong>
                    </p>
                    <!--Basic textarea-->
                    <div class="md-form">
                        <textarea type="text" name="description" id="description" class="md-textarea form-control" rows="3" placeholder="Your message"></textarea>

                    </div>

                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary waves-effect waves-light" name="report" onclick="reportGame()">Send
                        <i class="fa fa-paper-plane ml-1"></i>
                    </button>

                    <button type="cancel" class="btn btn-outline-primary" data-dismiss="modal">Cancel
                        <i class="fa fa-close"></i>
                    </button>


                </div>

            </form>




        </div>
    </div>
</div>

<script src="<?= GameHeaven ?>views/assets/ajax/ajax.js">
</script>
<?php
    if(!isset($_SESSION['visited']))
    {
        ?>
        <script>
            addToVisits();
        </script>
    <?php 
        $_SESSION['visited']=true;
}
if (isset($_SESSION['user'])) {
?>
    <script>
        getCart();
    </script>
<?php
}
?>
<script>

    function resetPassModal(){
        $("#modalForgotPassword").modal("show");
        $("#modalRegisterForm").modal("hide");
        $("#modalLoginForm").modal("hide");
    }

    function notLoggedInAddToCart() {
        new Toast({
            message: 'Please login or register before adding to cart',
            type: 'danger'
        });
    }

    function alreadyExists() {
        new Toast({
            message: "Game already exists in cart",
            type: 'danger'
        });
    }

    function addedToCart() {
        new Toast({
            message: "Game added to cart successfuly",
            type: 'success'
        });
    }

    function removedFromCart() {
        new Toast({
            message: "Game removed from cart successfuly",
            type: 'success'
        });
    }

    function reportedGame() {
        new Toast({
            message: "Game reported successfuly",
            type: 'success'
        });
    }
    function notVerified() {
        new Toast({
            message: "You are not verified yet. Wait for the admin to approve your request to be able to request your profile and publish games.",
            type: 'danger'
        });
    }
    function gameAdded() {
        new Toast({
            message: "Your newly published game is being revised by the admins , it will be shown in the site once the admins allow it.",
            type: 'success'
        });
    }
</script>