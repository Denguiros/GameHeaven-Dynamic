<?php
$this->_t = "Browsing games";

?>

<div>
    <div class="container" style="max-width: 80%;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="white-text">All Games</h1>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container" style="max-width: 80%;">
        <div class="row">
            <div class="col-md-10">
                <!--Section: Block Content-->
                <section id="body">
                    
                    <?php
                    if(count($games)>0)
                    {

                     foreach ($games as $game) {
                    ?>
                        <div class="product-list">
                            <a href="<?= GameHeaven . 'game/' . $game->game_id ?>">
                                <div class="row mb-4 ">
                                    <div class="col-md-5 col-lg-3 col-xl-3">
                                        <div class="cycle-slideshow" id="slideshow-<?= $game->generateRandomNumber() ?>" data-cycle-fx="fadeout" data-cycle-manual-fx="scrollHorz" data-cycle-timeout="500">
                                            <?php foreach ($game->getImages() as $image) {


                                            ?>
                                                <img src="<?= GameHeaven . $image ?>">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-9 col-xl-9">
                                        <div class="row">
                                            <div class="col-lg-7 col-xl-7">

                                                <h5><?= $game->game_name ?></h5>
                                                <p class="mb-2 text-muted text-uppercase small"><?= $game->releaseDate() ?></p>
                                                <hr>
                                                <p class="text-left">
                                                    <?php
                                                    foreach ($game->game_genres as $genre) {

                                                    ?>

                                                        <span class="badge badge-light" style="background-color: rgb(88,91,94);margin-right: 0.3em;;margin-bottom:0.3em"><?= $genre ?></span>
                                                    <?php }
                                                    ?>
                                                </p>
                                                <p class="mb-lg-0" style="color:white;">
                                                    <?php
                                                    foreach ($game->game_genres as $genre) {

                                                    ?>
                                                        <i class="fab fa-<?= $platform ?>" style="color: rgb(255,255,255);margin-right:0.3em;margin-bottom:0.3em"></i>

                                                    <?php }
                                                    ?>

                                                </p>

                                            </div>
                                            <div class="col-lg-5 col-xl-5">
                                            <?php
                                                    if ($game->game_discount > 0) {
                                                    ?>
                                                        <span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                            <i class="fa fa-tag fa-stack-2x"></i>
                                                            <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                        </span>
                                                        <p class="thumb-text">
                                                            <del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?></del>
                                                            $<?= $game->getDiscountedPrice() ?>
                                                        </p>
                                                    <?php } else {
                                                    ?>
                                                        <p class="thumb-text"> $<?= $game->game_price ?> </p>
                                                    <?php } ?>


                                                <div class="my-4">
                                                    <button type="button" class="btn btn-light btn-md mr-1 mb-2"><i class="fas fa-info-circle pr-2"></i>Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }
                    }
                    else
                    {
                        echo('<div class="product-list">
                        <h1 style="color:red"> No game was found ! </h1>
                    </div>');
                    }
                    ?>
                </section>
                <!--Section: Block Content-->
            </div>
            <div class="col-md-2">
                <!-- Section: Sidebar -->
                <div stlye="border:3px solid white;">
                    <section>
                        <!-- Section: Filters -->
                        <section>
                            <!-- Section: Price version 2 -->
                            <section class="mb-4">
                                <h6 class="font-weight-bold mb-3 white-text">Price</h6>
                                <div class="slider-price d-flex align-items-center my-4">
                                    <div class="d-flex justify-content-center my-4">
                                        <input id="price" class="border-0" type="range" min="0" max="65" step="5" value="<?php echo isset($_GET["price"]) && $_GET["price"]>=0 && $_GET["price"]<=65 ? $_GET["price"]:65 ?>" onchange="filterOptions()">
                                        <span class="font-weight-bold white-text ml-2 mt-1 valueSpan small-text"></span>
                                    </div>
                                </div>
                                <div class="form-check pl-0 mb-3">
                                    <input type="checkbox" class="form-check-input filled-in" id="discounted" value="discounted" onchange="filterOptions()">
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="discounted">Discounted</label>
                                </div>
                            </section>
                            <!-- Section: Price version 2 -->
                            <!-- Section: Condition -->
                            <h6 class="font-weight-bold mb-3 white-text">Genres</h6>
                            <section class="mb-4 genres overflow-auto" style="height:30rem">
                                
                                <div class="form-check pl-0 mb-3">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Action" value="Action" onchange="filterOptions()" <?php echo (isset($_GET["action"]) && $_GET["action"]==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Action">Action</label>
                                </div>
                                <div class="form-check pl-0 mb-3">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Adventure" value="Adventure" onchange="filterOptions()" <?php echo (isset($_GET["adventure"]) && $_GET["adventure"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Adventure">Adventure</label>
                                </div>
                                <div class="form-check pl-0 mb-3">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Platformer" value="Platformer" onchange="filterOptions()" <?php echo (isset($_GET["platformer"]) && $_GET["platformer"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Platformer">Platformer</label>
                                </div>
                                <div class="form-check pl-0 mb-3">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="VR" value="VR" onchange="filterOptions()" <?php echo (isset($_GET["vr"]) && $_GET["vr"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="VR">VR</label>
                                </div>
                                <div class="form-check pl-0 mb-3">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Controller-friendly" value="Controller-friendly" onchange="filterOptions()" <?php echo (isset($_GET["controller-friendly"]) && $_GET["controller-friendly"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Controller-friendly">Controller Friendly</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Shooter" value="Shooter" onchange="filterOptions()" <?php echo (isset($_GET["shooter"]) && $_GET["shooter"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Shooter">Shooter</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Stealth" value="Stealth" onchange="filterOptions()" <?php echo (isset($_GET["stealth"]) && $_GET["stealth"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Stealth">Stealth</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Survival" value="Survival" onchange="filterOptions()" <?php echo (isset($_GET["survival"]) && $_GET["survival"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Survival">Survival</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Battle-Royale" value="Battle-Royale" onchange="filterOptions()" <?php echo (isset($_GET["battle-royale"]) && $_GET["battle-royale"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Battle-Royale">Battle Royale</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="RPG" value="RPG" onchange="filterOptions()" <?php echo (isset($_GET["rpg"]) && $_GET["rpg"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="RPG">RPG</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="First-person" value="First-person" onchange="filterOptions()" <?php echo (isset($_GET["first-person"]) && $_GET["first-person"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="First-person">First-person</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Simulation" value="Simulation" onchange="filterOptions()" <?php echo (isset($_GET["simulation"]) && $_GET["simulation"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Simulation">Simulation</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Vehicle" value="Vehicle" onchange="filterOptions()" <?php echo (isset($_GET["vehicle"]) && $_GET["vehicle"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Vehicle">Vehicle</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Strategy" value="Strategy" onchange="filterOptions()" <?php echo (isset($_GET["strategy"]) && $_GET["strategy"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Strategy">Strategy</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Tower-defense" value="Tower-defense" onchange="filterOptions()" <?php echo (isset($_GET["tower-defense"]) && $_GET["tower-defense"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Tower-defense">Tower defense</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Turn-based" value="Turn-based" onchange="filterOptions()" <?php echo (isset($_GET["turn-based"]) && $_GET["turn-based"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Turn-based">Turn-based</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Sports" value="Sports" onchange="filterOptions()" <?php echo (isset($_GET["sports"]) && $_GET["sports"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Sports">Sports</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Racing" value="Racing" onchange="filterOptions()" <?php echo (isset($_GET["racing"]) && $_GET["racing"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Racing">Racing</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="MMO" value="MMO" onchange="filterOptions()" <?php echo (isset($_GET["mmo"]) && $_GET["mmo"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="MMO">MMO</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Board" value="Board" onchange="filterOptions()" <?php echo (isset($_GET["board"]) && $_GET["board"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Board">Board</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Idle" value="Idle" onchange="filterOptions()" <?php echo (isset($_GET["idle"]) && $_GET["idle"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Idle">Idle</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Casual" value="Casual" onchange="filterOptions()" <?php echo (isset($_GET["casual"]) && $_GET["casual"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Casual">Casual</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Card" value="Card" onchange="filterOptions()" <?php echo (isset($_GET["card"]) && $_GET["card"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Card">Card</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Logic" value="Logic" onchange="filterOptions()" <?php echo (isset($_GET["logic"]) && $_GET["logic"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Logic">Logic</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Sandbox" value="Sandbox" onchange="filterOptions()" <?php echo (isset($_GET["sandbox"]) && $_GET["sandbox"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Sandbox">Sandbox</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Open-world" value="Open-world" onchange="filterOptions()" <?php echo (isset($_GET["open-world"]) && $_GET["open-world"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Open-world">Open world</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Puzzle" value="Puzzle" onchange="filterOptions()" <?php echo (isset($_GET["puzzle"]) && $_GET["puzzle"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Puzzle">Puzzle</label>
                                </div>
                                <div class="form-check pl-0 mb-3 pb-1">
                                    <input type="checkbox" class="form-check-input filled-in genre" id="Indie" value="Indie" onchange="filterOptions()" <?php echo (isset($_GET["indie"]) && $_GET["indie"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="Indie">Indie</label>
                                </div>
                            </section>
                            <!-- Section: Condition -->
                            <!-- Section: Condition 2 -->
                            <section class="mb-4 platforms">
                                <h6 class="font-weight-bold mb-3 white-text">Operating System</h6>
                                <div class="form-check pl-0 mb-3">
                                    <input type="checkbox" class="form-check-input filled-in platform " id="windows" value="windows" onchange="filterOptions()" <?php echo (isset($_GET["windows"])  && $_GET["windows"] ==1? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="windows">Windows</label>
                                </div>
                                <div class="form-check pl-0 mb-3">
                                    <input type="checkbox" class="form-check-input filled-in platform" id="mac" value="mac" onchange="filterOptions()" <?php echo (isset($_GET["mac"])  && $_GET["windows"] ==1? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="mac">Mac</label>
                                </div>
                                <div class="form-check pl-0 mb-3">
                                    <input type="checkbox" class="form-check-input filled-in platform" id="linux" value="linux" onchange="filterOptions()" <?php echo (isset($_GET["linux"]) && $_GET["windows"] ==1 ? "checked" : "") ?>>
                                    <label class="form-check-label small text-uppercase card-link-secondary white-text" for="linux">Linux</label>
                                </div>
                            </section>
                            <!-- Section: Condition -->
                        </section>
                        <!-- Section: Filters -->
                    </section>
                    <!-- Section: Sidebar -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= GameHeaven ?>views/assets/ajax/browse.js">
</script>

<?php
if (isset($_GET["franchise"])) {
} else {
?>
    <script>
        filterOptions()
    </script>
<?php
}
?>