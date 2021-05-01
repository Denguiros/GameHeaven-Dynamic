<?php

$this->_t = "Editing " . $game->game_name;

?>
<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/tagify/tagify.css">

<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/wysiwyg/css/yseditor.css" />



<div class="row register-form" style="margin-right: 0;margin-left: 0;">
    <div class="col-md-8 offset-md-2">
        <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data" id="addGameForm" onsubmit="return send();">

            <input type="hidden" value="<?= $game->game_id ?>" name="game_id">

            <h1 style="color: rgb(255,255,255);">Editing <?= $game->game_name ?></h1>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" for="title" style="color: rgb(255,255,255);">Title</label>
                </div>
                <div class="col-sm-6 input-column">
                    <input class="form-control" type="text" name="title" value="<?= $game->game_name ?>" required placeholder="Game title">
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" for="releaseDate" style="color: rgb(255,255,255);">Release Date</label>
                </div>
                <div class="col-sm-6 input-column">
                    <?php  ?>
                    <input class="form-control" type="date" value="<?= $game->getReleaseDate(); ?>" name="releaseDate" required>
                </div>
            </div>
            <!--
                <div class="form-row form-group">
                    <div class="col-sm-3 label-column">
                        <label class="col-form-label" style="color: rgb(255,255,255);">Franchise name</label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" value="<?php //$franchise["franchise_name"] ?? "" 
                                                                        ?>" name="franchise" placeholder="Optional"></div>
                </div>
-->


            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" for="genres" style="color: rgb(255,255,255);">Genres</label></div>

                <div class="col-sm-6 input-column">
                    <input name='input' class='some_class_name' placeholder='write some tags' value='<?= $game->game_genres ?>' data-blacklist=''>
                    <button class='tags--removeAllBtn' type='button'>Remove all Genres ⬆</button>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" for="price" style="color: rgb(255,255,255);">Price</label>
                </div>
                <div class="col-sm-6 input-column">
                    <input class="form-control" type="number" name="price" placeholder="In $" value="<?= $game->game_price ?>" required>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" style="color: rgb(255,255,255);">Pegi rating</label>
                </div>
                <div class="col-sm-6 input-column">
                    <select class="pegi" style="width:100%" name="pegi">
                        <option></option>
                        <option value="1" <?php if ($game->pegi_rating_id == 1) echo ("Selected");  ?>>3</option>
                        <option value="2" <?php if ($game->pegi_rating_id == 2) echo ("Selected");  ?>>7</option>
                        <option value="3" <?php if ($game->pegi_rating_id == 3) echo ("Selected");  ?>>12</option>
                        <option value="4" <?php if ($game->pegi_rating_id == 4) echo ("Selected");  ?>>16</option>
                        <option value="5" <?php if ($game->pegi_rating_id == 5) echo ("Selected");  ?>>18</option>
                    </select>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" style="color: rgb(255,255,255); text-align: center;font-size: 23px;">Description</label>
                </div>



                <div id="yseditor"><?php echo htmlspecialchars_decode(stripslashes($game->game_description));  ?></div>

                <input type="hidden" name="description" id="hidden" />



            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" style="color: rgb(255,255,255);">Platforms</label>
                </div>
                <div class="col-sm-6 input-column">
                    <?php $p = explode(",", $game->game_platforms); ?>
                    <div class="form-check" style="color: rgb(255,255,255);">
                        <input class="form-check-input" type="checkbox" id="windowsP" name="platforms[]" value="windows" onclick="showHR()" <?php if (in_array("windows", $p)) echo ("checked"); ?>><label class="form-check-label" for="windowsP">Windows</label>
                    </div>
                    <div class="form-check" style="color: rgb(255,255,255);"><input class="form-check-input" type="checkbox" id="formCheck-2" name="platforms[]" value="xbox" <?php if (in_array("xbox", $p)) echo ("checked"); ?>><label class="form-check-label" for="formCheck-2">Xbox one</label></div>

                    <div class="form-check" style="color: rgb(255,255,255);"><input class="form-check-input" type="checkbox" id="formCheck-4" name="platforms[]" value="ps4" <?php if (in_array("ps4", $p)) echo ("checked"); ?>><label class="form-check-label" for="formCheck-4">Playstation 4</label></div>
                </div>
            </div>

            <button class="btn btn-danger submit-button" id="submit" type="submit" name="updateBasicGameInfo">Edit General Game Info</button>

        </form>
    </div>
</div>
<div class="row register-form" style="margin-right: 0;margin-left: 0; align-items: center;" id="HR">
    <div class="col-md-8 offset-md-2" id="changeFranchise">
        <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data">
            <h1 style="color: rgb(255,255,255);">Hardware requirements</h1>





            <div class="table-responsive" style="color: rgb(255,255,255);">
                <table class="table" style="font-weight: bold;">
                    <thead>
                        <tr>
                            <th width="33%"></th>
                            <th style="color: rgb(255,255,255);">Minimum requirements</th>
                            <th>Recommneded requirements</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="text-center" width="20%">Operating system &nbsp;&nbsp;</td>
                            <td>
                                <select class="os" name="osMin" style="width: 100%;">
                                    <option></option>
                                    <option value="Windows XP" <?php if ($game->game_min_os == "Windows XP") echo ("Selected") ?>>Windows xp</option>
                                    <option value="Windows 7" <?php if ($game->game_min_os == "Windows 7") echo ("Selected") ?>>Windows 7</option>
                                    <option value="Windows 8" <?php if ($game->game_min_os == "Windows 8") echo ("Selected") ?>>Windows 8</option>
                                    <option value="Windows 10" <?php if ($game->game_min_os == "Windows 10") echo ("Selected") ?>>Windows 10</option>

                                </select>
                            </td>
                            <td class="text-center"><select class="os" style="width:100%" name="osRec">
                                    <option></option>
                                    <option value="Windows XP" <?php if ($game->game_recommended_os == "Windows XP") echo ("Selected") ?>>Windows xp</option>
                                    <option value="Windows 7" <?php if ($game->game_recommended_os == "Windows 7") echo ("Selected") ?>>Windows 7</option>
                                    <option value="Windows 8" <?php if ($game->game_recommended_os == "Windows 8") echo ("Selected") ?>>Windows 8</option>
                                    <option value="Windows 10" <?php if ($game->game_recommended_os == "Windows 10") echo ("Selected") ?>>Windows 10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>


                        <tr>
                            <td class="text-center">Processor </td>
                            <td>
                                <select class="processor" style="width:100%" name="processorMin">
                                    <option></option>
                                    <option value="i9-10900" <?php if ($game->game_min_processor == "i9-10900") echo ("Selected") ?>>i9-10900</option>
                                    <option value="i9-10850" <?php if ($game->game_min_processor == "i9-10850") echo ("Selected") ?>>i9-10850</option>
                                    <option value="i7-10700" <?php if ($game->game_min_processor == "i7-10700") echo ("Selected") ?>>i7-10700</option>
                                    <option value="i5-10600" <?php if ($game->game_min_processor == "i5-10600") echo ("Selected") ?>>i5-10600</option>
                                    <option value="i5-10400" <?php if ($game->game_min_processor == "i5-10400") echo ("Selected") ?>>i5-10400</option>
                                    <option value="i3-10300" <?php if ($game->game_min_processor == "i3-10300") echo ("Selected") ?>>i3-10300</option>
                                    <option value="i3-10100" <?php if ($game->game_min_processor == "i3-10100") echo ("Selected") ?>>i3-10100</option>
                                    <option value="i9-9900" <?php if ($game->game_min_processor == "i9-9900") echo ("Selected") ?>>i9-9900</option>
                                    <option value="i7-9700" <?php if ($game->game_min_processor == "i7-9700") echo ("Selected") ?>>i7-9700</option>
                                    <option value="i5-9600" <?php if ($game->game_min_processor == "i5-9600") echo ("Selected") ?>>i5-9600</option>
                                    <option value="i5-9400" <?php if ($game->game_min_processor == "i5-9400") echo ("Selected") ?>>i5-9400</option>
                                    <option value="i3-9100" <?php if ($game->game_min_processor == "i3-9100") echo ("Selected") ?>>i3-9100</option>
                                    <option value="i7-8750" <?php if ($game->game_min_processor == "i7-8750") echo ("Selected") ?>>i7-8750</option>
                                    <option value="i5-8500" <?php if ($game->game_min_processor == "i5-8500") echo ("Selected") ?>>i5-8500</option>
                                    <option value="i5-8400" <?php if ($game->game_min_processor == "i5-8400") echo ("Selected") ?>>i5-8400</option>
                                    <option value="i3-8145" <?php if ($game->game_min_processor == "i3-8145") echo ("Selected") ?>>i3-8145</option>
                                    <option value="i3-8130" <?php if ($game->game_min_processor == "i3-8130") echo ("Selected") ?>>i3-8130</option>
                                    <option value="i3-8100" <?php if ($game->game_min_processor == "i3-8100") echo ("Selected") ?>>i3-8100</option>
                                    <option value="i9-7980" <?php if ($game->game_min_processor == "i9-7980") echo ("Selected") ?>>i9-7980</option>
                                    <option value="i9-7900" <?php if ($game->game_min_processor == "i9-7900") echo ("Selected") ?>>i9-7900</option>
                                    <option value="i7-7700" <?php if ($game->game_min_processor == "i7-7700") echo ("Selected") ?>>i7-7700</option>
                                    <option value="i5-7600" <?php if ($game->game_min_processor == "i5-7600") echo ("Selected") ?>>i5-7600</option>
                                    <option value="i5-7500" <?php if ($game->game_min_processor == "i5-7500") echo ("Selected") ?>>i5-7500</option>
                                    <option value="i3-7300" <?php if ($game->game_min_processor == "i3-7300") echo ("Selected") ?>>i3-7300</option>
                                    <option value="G4620" <?php if ($game->game_min_processor == "G4620") echo ("Selected") ?>>G4620</option>
                                    <option value="G4600" <?php if ($game->game_min_processor == "G4600") echo ("Selected") ?>>G4600</option>
                                    <option value="G4560" <?php if ($game->game_min_processor == "G4560") echo ("Selected") ?>>G4560</option>
                                    <option value="G3950" <?php if ($game->game_min_processor == "G3950") echo ("Selected") ?>>G3950</option>
                                    <option value="Ryzen 3 1200" <?php if ($game->game_min_processor == "Ryzen 3 1200") echo ("Selected") ?>>Ryzen 3 1200</option>
                                    <option value="Ryzen 5 1400" <?php if ($game->game_min_processor == "Ryzen 5 1400") echo ("Selected") ?>>Ryzen 5 1400</option>
                                    <option value="Ryzen 5 1600" <?php if ($game->game_min_processor == "Ryzen 5 1600") echo ("Selected") ?>>Ryzen 5 1600</option>
                                    <option value="Ryzen 7 1700" <?php if ($game->game_min_processor == "Ryzen 7 1700") echo ("Selected") ?>>Ryzen 7 1700</option>
                                    <option value="Ryzen 7 1800 X" <?php if ($game->game_min_processor == "Ryzen 7 1800 X") echo ("Selected") ?>>Ryzen 7 1800 X </option>
                                    <option value="Ryzen Threadripper 1900X" <?php if ($game->game_min_processor == "Ryzen Threadripper 1900X") echo ("Selected") ?>>Ryzen Threadripper 1900X</option>
                                    <option value="Ryzen 3 2300" <?php if ($game->game_min_processor == "Ryzen 3 2300") echo ("Selected") ?>>Ryzen 3 2300</option>
                                    <option value="Ryzen 5 2600" <?php if ($game->game_min_processor == "Ryzen 5 2600") echo ("Selected") ?>>Ryzen 5 2600</option>
                                    <option value="Ryzen 7 2700" <?php if ($game->game_min_processor == "Ryzen 7 2700") echo ("Selected") ?>>Ryzen 7 2700</option>
                                    <option value="Ryzen 3 3100" <?php if ($game->game_min_processor == "Ryzen 3 3100") echo ("Selected") ?>>Ryzen 3 3100</option>
                                    <option value="Ryzen 5 3500" <?php if ($game->game_min_processor == "Ryzen 5 3500") echo ("Selected") ?>>Ryzen 5 3500</option>
                                    <option value="Ryzen 5 3600" <?php if ($game->game_min_processor == "Ryzen 5 3600") echo ("Selected") ?>>Ryzen 5 3600</option>
                                    <option value="Ryzen 7 3700X" <?php if ($game->game_min_processor == "Ryzen 7 3700X") echo ("Selected") ?>>Ryzen 7 3700X</option>
                                    <option value="Ryzen 7 3800X" <?php if ($game->game_min_processor == "Ryzen 7 3800X") echo ("Selected") ?>>Ryzen 7 3800X</option>
                                    <option value="Ryzen 9 3900" <?php if ($game->game_min_processor == "Ryzen 9 3900") echo ("Selected") ?>>Ryzen 9 3900</option>
                                    <option value="Ryzen 9 3950X" <?php if ($game->game_min_processor == "Ryzen 9 3950X") echo ("Selected") ?>>Ryzen 9 3950X</option>
                                    <option value="Ryzen Threadripper 3990X" <?php if ($game->game_min_processor == "Ryzen Threadripper 3990X") echo ("Selected") ?>>Ryzen Threadripper 3990X</option>
                                    <option value="Ryzen 5 5600X" <?php if ($game->game_min_processor == "Ryzen 5 5600X") echo ("Selected") ?>>Ryzen 5 5600X</option>
                                    <option value="Ryzen 7 5800X" <?php if ($game->game_min_processor == "Ryzen 7 5800X") echo ("Selected") ?>>Ryzen 7 5800X</option>
                                    <option value="Ryzen 9 5900X" <?php if ($game->game_min_processor == "Ryzen 9 5900X") echo ("Selected") ?>>Ryzen 9 5900X</option>
                                    <option value="FX-4100" <?php if ($game->game_min_processor == "FX-4100") echo ("Selected") ?>>FX-4100</option>
                                    <option value="FX-6100" <?php if ($game->game_min_processor == "FX-6100") echo ("Selected") ?>>FX-6100</option>
                                    <option value="FX-8100" <?php if ($game->game_min_processor == "FX-8100") echo ("Selected") ?>>FX-8100</option>
                                    <option value="FX-4300" <?php if ($game->game_min_processor == "FX-4300") echo ("Selected") ?>>FX-4300</option>
                                    <option value="FX-6300" <?php if ($game->game_min_processor == "FX-6300") echo ("Selected") ?>>FX-6300</option>
                                    <option value="FX-8300" <?php if ($game->game_min_processor == "FX-8300") echo ("Selected") ?>>FX-8300</option>
                                </select>
                            </td>
                            <td class="text-center"><select class="processor" style="width:100%" name="processorRec">
                                    <option></option>
                                    <option value="i9-10900" <?php if ($game->game_recommended_processor == "i9-10900") echo ("Selected") ?>>i9-10900</option>
                                    <option value="i9-10850" <?php if ($game->game_recommended_processor == "i9-10850") echo ("Selected") ?>>i9-10850</option>
                                    <option value="i7-10700" <?php if ($game->game_recommended_processor == "i7-10700") echo ("Selected") ?>>i7-10700</option>
                                    <option value="i5-10600" <?php if ($game->game_recommended_processor == "i5-10600") echo ("Selected") ?>>i5-10600</option>
                                    <option value="i5-10400" <?php if ($game->game_recommended_processor == "i5-10400") echo ("Selected") ?>>i5-10400</option>
                                    <option value="i3-10300" <?php if ($game->game_recommended_processor == "i3-10300") echo ("Selected") ?>>i3-10300</option>
                                    <option value="i3-10100" <?php if ($game->game_recommended_processor == "i3-10100") echo ("Selected") ?>>i3-10100</option>
                                    <option value="i9-9900" <?php if ($game->game_recommended_processor == "i9-9900") echo ("Selected") ?>>i9-9900</option>
                                    <option value="i7-9700" <?php if ($game->game_recommended_processor == "i7-9700") echo ("Selected") ?>>i7-9700</option>
                                    <option value="i5-9600" <?php if ($game->game_recommended_processor == "i5-9600") echo ("Selected") ?>>i5-9600</option>
                                    <option value="i5-9400" <?php if ($game->game_recommended_processor == "i5-9400") echo ("Selected") ?>>i5-9400</option>
                                    <option value="i3-9100" <?php if ($game->game_recommended_processor == "i3-9100") echo ("Selected") ?>>i3-9100</option>
                                    <option value="i7-8750" <?php if ($game->game_recommended_processor == "i7-8750") echo ("Selected") ?>>i7-8750</option>
                                    <option value="i5-8500" <?php if ($game->game_recommended_processor == "i5-8500") echo ("Selected") ?>>i5-8500</option>
                                    <option value="i5-8400" <?php if ($game->game_recommended_processor == "i5-8400") echo ("Selected") ?>>i5-8400</option>
                                    <option value="i3-8145" <?php if ($game->game_recommended_processor == "i3-8145") echo ("Selected") ?>>i3-8145</option>
                                    <option value="i3-8130" <?php if ($game->game_recommended_processor == "i3-8130") echo ("Selected") ?>>i3-8130</option>
                                    <option value="i3-8100" <?php if ($game->game_recommended_processor == "i3-8100") echo ("Selected") ?>>i3-8100</option>
                                    <option value="i9-7980" <?php if ($game->game_recommended_processor == "i9-7980") echo ("Selected") ?>>i9-7980</option>
                                    <option value="i9-7900" <?php if ($game->game_recommended_processor == "i9-7900") echo ("Selected") ?>>i9-7900</option>
                                    <option value="i7-7700" <?php if ($game->game_recommended_processor == "i7-7700") echo ("Selected") ?>>i7-7700</option>
                                    <option value="i5-7600" <?php if ($game->game_recommended_processor == "i5-7600") echo ("Selected") ?>>i5-7600</option>
                                    <option value="i5-7500" <?php if ($game->game_recommended_processor == "i5-7500") echo ("Selected") ?>>i5-7500</option>
                                    <option value="i3-7300" <?php if ($game->game_recommended_processor == "i3-7300") echo ("Selected") ?>>i3-7300</option>
                                    <option value="G4620" <?php if ($game->game_recommended_processor == "G4620") echo ("Selected") ?>>G4620</option>
                                    <option value="G4600" <?php if ($game->game_recommended_processor == "G4600") echo ("Selected") ?>>G4600</option>
                                    <option value="G4560" <?php if ($game->game_recommended_processor == "G4560") echo ("Selected") ?>>G4560</option>
                                    <option value="G3950" <?php if ($game->game_recommended_processor == "G3950") echo ("Selected") ?>>G3950</option>
                                    <option value="Ryzen 3 1200" <?php if ($game->game_recommended_processor == "Ryzen 3 1200") echo ("Selected") ?>>Ryzen 3 1200</option>
                                    <option value="Ryzen 5 1400" <?php if ($game->game_recommended_processor == "Ryzen 5 1400") echo ("Selected") ?>>Ryzen 5 1400</option>
                                    <option value="Ryzen 5 1600" <?php if ($game->game_recommended_processor == "Ryzen 5 1600") echo ("Selected") ?>>Ryzen 5 1600</option>
                                    <option value="Ryzen 7 1700" <?php if ($game->game_recommended_processor == "Ryzen 7 1700") echo ("Selected") ?>>Ryzen 7 1700</option>
                                    <option value="Ryzen 7 1800 X" <?php if ($game->game_recommended_processor == "Ryzen 7 1800 X") echo ("Selected") ?>>Ryzen 7 1800 X </option>
                                    <option value="Ryzen Threadripper 1900X" <?php if ($game->game_recommended_processor == "Ryzen Threadripper 1900X") echo ("Selected") ?>>Ryzen Threadripper 1900X</option>
                                    <option value="Ryzen 3 2300" <?php if ($game->game_recommended_processor == "Ryzen 3 2300") echo ("Selected") ?>>Ryzen 3 2300</option>
                                    <option value="Ryzen 5 2600" <?php if ($game->game_recommended_processor == "Ryzen 5 2600") echo ("Selected") ?>>Ryzen 5 2600</option>
                                    <option value="Ryzen 7 2700" <?php if ($game->game_recommended_processor == "Ryzen 7 2700") echo ("Selected") ?>>Ryzen 7 2700</option>
                                    <option value="Ryzen 3 3100" <?php if ($game->game_recommended_processor == "Ryzen 3 3100") echo ("Selected") ?>>Ryzen 3 3100</option>
                                    <option value="Ryzen 5 3500" <?php if ($game->game_recommended_processor == "Ryzen 5 3500") echo ("Selected") ?>>Ryzen 5 3500</option>
                                    <option value="Ryzen 5 3600" <?php if ($game->game_recommended_processor == "Ryzen 5 3600") echo ("Selected") ?>>Ryzen 5 3600</option>
                                    <option value="Ryzen 7 3700X" <?php if ($game->game_recommended_processor == "Ryzen 7 3700X") echo ("Selected") ?>>Ryzen 7 3700X</option>
                                    <option value="Ryzen 7 3800X" <?php if ($game->game_recommended_processor == "Ryzen 7 3800X") echo ("Selected") ?>>Ryzen 7 3800X</option>
                                    <option value="Ryzen 9 3900" <?php if ($game->game_recommended_processor == "Ryzen 9 3900") echo ("Selected") ?>>Ryzen 9 3900</option>
                                    <option value="Ryzen 9 3950X" <?php if ($game->game_recommended_processor == "Ryzen 9 3950X") echo ("Selected") ?>>Ryzen 9 3950X</option>
                                    <option value="Ryzen Threadripper 3990X" <?php if ($game->game_recommended_processor == "Ryzen Threadripper 3990X") echo ("Selected") ?>>Ryzen Threadripper 3990X</option>
                                    <option value="Ryzen 5 5600X" <?php if ($game->game_recommended_processor == "Ryzen 5 5600X") echo ("Selected") ?>>Ryzen 5 5600X</option>
                                    <option value="Ryzen 7 5800X" <?php if ($game->game_recommended_processor == "Ryzen 7 5800X") echo ("Selected") ?>>Ryzen 7 5800X</option>
                                    <option value="Ryzen 9 5900X" <?php if ($game->game_recommended_processor == "Ryzen 9 5900X") echo ("Selected") ?>>Ryzen 9 5900X</option>
                                    <option value="FX-4100" <?php if ($game->game_recommended_processor == "FX-4100") echo ("Selected") ?>>FX-4100</option>
                                    <option value="FX-6100" <?php if ($game->game_recommended_processor == "FX-6100") echo ("Selected") ?>>FX-6100</option>
                                    <option value="FX-8100" <?php if ($game->game_recommended_processor == "FX-8100") echo ("Selected") ?>>FX-8100</option>
                                    <option value="FX-4300" <?php if ($game->game_recommended_processor == "FX-4300") echo ("Selected") ?>>FX-4300</option>
                                    <option value="FX-6300" <?php if ($game->game_recommended_processor == "FX-6300") echo ("Selected") ?>>FX-6300</option>
                                    <option value="FX-8300" <?php if ($game->game_recommended_processor == "FX-8300") echo ("Selected") ?>>FX-8300</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">Ram </td>
                            <td>
                                <select class="ram" style="width:100%" name="ramMin">
                                    <option></option>
                                    <option value="1GB" <?php if ($game->game_min_memory == "1GB") echo ("Selected") ?>>1GB</option>
                                    <option value="2GB" <?php if ($game->game_min_memory == "2GB") echo ("Selected") ?>>2GB</option>
                                    <option value="4GB" <?php if ($game->game_min_memory == "4GB") echo ("Selected") ?>>4GB</option>
                                    <option value="8GB" <?php if ($game->game_min_memory == "8GB") echo ("Selected") ?>>8GB</option>
                                    <option value="16GB" <?php if ($game->game_min_memory == "16GB") echo ("Selected") ?>>16GB</option>
                                    <option value="32GB" <?php if ($game->game_min_memory == "32GB") echo ("Selected") ?>>32GB</option>
                                    <option value="64GB" <?php if ($game->game_min_memory == "64GB") echo ("Selected") ?>>64GB</option>
                                </select>
                            </td>
                            <td><select class="ram" style="width:100%" name="ramRec">
                                    <option></option>
                                    <option value="1GB" <?php if ($game->game_recommended_memory == "1GB") echo ("Selected") ?>>1GB</option>
                                    <option value="2GB" <?php if ($game->game_recommended_memory == "2GB") echo ("Selected") ?>>2GB</option>
                                    <option value="4GB" <?php if ($game->game_recommended_memory == "4GB") echo ("Selected") ?>>4GB</option>
                                    <option value="8GB" <?php if ($game->game_recommended_memory == "8GB") echo ("Selected") ?>>8GB</option>
                                    <option value="16GB" <?php if ($game->game_recommended_memory == "16GB") echo ("Selected") ?>>16GB</option>
                                    <option value="32GB" <?php if ($game->game_recommended_memory == "32GB") echo ("Selected") ?>>32GB</option>
                                    <option value="64GB" <?php if ($game->game_recommended_memory == "64GB") echo ("Selected") ?>>64GB</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">Graphics </td>
                            <td>
                                <select class="gpu" style="width:100%" name="graphicsMin">
                                    <option></option>
                                    <option value="Nvidia GeForce RTX 3090" <?php if ($game->game_min_graphics == "Nvidia GeForce RTX 3090") echo ("Selected") ?>>Nvidia GeForce RTX 3090</option>
                                    <option value="Nvidia GeForce RTX 3080" <?php if ($game->game_min_graphics == "Nvidia GeForce RTX 3080") echo ("Selected") ?>>Nvidia GeForce RTX 3080</option>
                                    <option value="Nvidia GeForce RTX 3070" <?php if ($game->game_min_graphics == "Nvidia GeForce RTX 3070") echo ("Selected") ?>>Nvidia GeForce RTX 3070</option>
                                    <option value="Nvidia GeForce RTX 3060" <?php if ($game->game_min_graphics == "Nvidia GeForce RTX 3060") echo ("Selected") ?>>Nvidia GeForce RTX 3060</option>
                                    <option value="Nvidia GeForce RTX 2080 Ti" <?php if ($game->game_min_graphics == "Nvidia GeForce RTX 2080 Ti") echo ("Selected") ?>>Nvidia GeForce RTX 2080 Ti</option>
                                    <option value="Nvidia GeForce RTX 2080" <?php if ($game->game_min_graphics == "Nvidia GeForce RTX 2080") echo ("Selected") ?>>Nvidia GeForce RTX 2080</option>
                                    <option value="Nvidia GeForce RTX 2070" <?php if ($game->game_min_graphics == "Nvidia GeForce RTX 2070") echo ("Selected") ?>>Nvidia GeForce RTX 2070</option>
                                    <option value="Nvidia GeForce RTX 2060" <?php if ($game->game_min_graphics == "Nvidia GeForce RTX 2060") echo ("Selected") ?>>Nvidia GeForce RTX 2060</option>
                                    <option value="Nvidia GeForce GTX 1080 Ti" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 1080 Ti") echo ("Selected") ?>>Nvidia GeForce GTX 1080 Ti</option>
                                    <option value="Nvidia GeForce GTX 1080" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 1080") echo ("Selected") ?>>Nvidia GeForce GTX 1080</option>
                                    <option value="Nvidia GeForce GTX 1070" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 1070") echo ("Selected") ?>>Nvidia GeForce GTX 1070</option>
                                    <option value="Nvidia GeForce GTX 1060" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 1060") echo ("Selected") ?>>Nvidia GeForce GTX 1060</option>
                                    <option value="Nvidia GeForce GTX 1050" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 1050") echo ("Selected") ?>>Nvidia GeForce GTX 1050</option>
                                    <option value="Nvidia GeForce GTX 1650 Super" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 1650 Super") echo ("Selected") ?>>Nvidia GeForce GTX 1650 Super</option>
                                    <option value="Nvidia GeForce GTX 1660 Ti" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 1660 Ti") echo ("Selected") ?>>Nvidia GeForce GTX 1660 Ti</option>
                                    <option value="Nvidia GeForce GT 1030" <?php if ($game->game_min_graphics == "Nvidia GeForce RTX GT 1030") echo ("Selected") ?>>Nvidia GeForce GT 1030</option>
                                    <option value="Nvidia GeForce GTX 980 Ti" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 980 Ti") echo ("Selected") ?>>Nvidia GeForce GTX 980 Ti</option>
                                    <option value="Nvidia GeForce GTX 980" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 980") echo ("Selected") ?>>Nvidia GeForce GTX 980</option>
                                    <option value="Nvidia GeForce GTX 970" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 970") echo ("Selected") ?>>Nvidia GeForce GTX 970</option>
                                    <option value="Nvidia GeForce GTX 960" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 960") echo ("Selected") ?>>Nvidia GeForce GTX 960</option>
                                    <option value="Nvidia GeForce GTX 950" <?php if ($game->game_min_graphics == "Nvidia GeForce GTX 950") echo ("Selected") ?>>Nvidia GeForce GTX 950</option>
                                    <option value="AMD Radeon RX 6800 XT" <?php if ($game->game_min_graphics == "AMD Radeon RX 6900 XT") echo ("Selected") ?>>AMD Radeon RX 6900 XT</option>
                                    <option value="AMD Radeon RX 6800 XT" <?php if ($game->game_min_graphics == "AMD Radeon RX 6800 XT") echo ("Selected") ?>>AMD Radeon RX 6800 XT</option>
                                    <option value="AMD Radeon RX 6800 XT" <?php if ($game->game_min_graphics == "AMD Radeon RX 6700 XT") echo ("Selected") ?>>AMD Radeon RX 6700 XT</option>
                                    <option value="AMD Radeon RX 5700 XT" <?php if ($game->game_min_graphics == "AMD Radeon RX 5700 XT") echo ("Selected") ?>>AMD Radeon RX 5700 XT</option>
                                    <option value="AMD Radeon RX 5500 XT 8GB" <?php if ($game->game_min_graphics == "AMD Radeon RX 5500 XT 8GB") echo ("Selected") ?>>AMD Radeon RX 5500 XT 8GB</option>
                                    <option value="AMD Radeon RX Vega 64" <?php if ($game->game_min_graphics == "AMD Radeon RX Vega 64") echo ("Selected") ?>>AMD Radeon RX Vega 64</option>
                                    <option value="AMD Radeon R9 390" <?php if ($game->game_min_graphics == "AMD Radeon R9 390") echo ("Selected") ?>>AMD Radeon R9 390</option>
                                    <option value="AMD Radeon RX 590" <?php if ($game->game_min_graphics == "AMD Radeon RX 590") echo ("Selected") ?>>AMD Radeon RX 590</option>
                                    <option value="AMD Radeon RX 580" <?php if ($game->game_min_graphics == "AMD Radeon RX 580") echo ("Selected") ?>>AMD Radeon RX 580</option>
                                    <option value="AMD Radeon RX 570" <?php if ($game->game_min_graphics == "AMD Radeon RX 570") echo ("Selected") ?>>AMD Radeon RX 570</option>
                                    <option value="AMD Radeon RX 560" <?php if ($game->game_min_graphics == "AMD Radeon RX 560") echo ("Selected") ?>>AMD Radeon RX 560</option>
                                    <option value="AMD Radeon RX 550" <?php if ($game->game_min_graphics == "AMD Radeon RX 550") echo ("Selected") ?>>AMD Radeon RX 550</option>
                                </select>
                            </td>
                            <td><select class="gpu" style="width:100%" name="graphicsRec">
                                    <option></option>
                                    <option value="Nvidia GeForce RTX 3090" <?php if ($game->game_recommended_graphics == "Nvidia GeForce RTX 3090") echo ("Selected") ?>>Nvidia GeForce RTX 3090</option>
                                    <option value="Nvidia GeForce RTX 3080" <?php if ($game->game_recommended_graphics == "Nvidia GeForce RTX 3080") echo ("Selected") ?>>Nvidia GeForce RTX 3080</option>
                                    <option value="Nvidia GeForce RTX 3070" <?php if ($game->game_recommended_graphics == "Nvidia GeForce RTX 3070") echo ("Selected") ?>>Nvidia GeForce RTX 3070</option>
                                    <option value="Nvidia GeForce RTX 3060" <?php if ($game->game_recommended_graphics == "Nvidia GeForce RTX 3060") echo ("Selected") ?>>Nvidia GeForce RTX 3060</option>
                                    <option value="Nvidia GeForce RTX 2080 Ti" <?php if ($game->game_recommended_graphics == "Nvidia GeForce RTX 2080 Ti") echo ("Selected") ?>>Nvidia GeForce RTX 2080 Ti</option>
                                    <option value="Nvidia GeForce RTX 2080" <?php if ($game->game_recommended_graphics == "Nvidia GeForce RTX 2080") echo ("Selected") ?>>Nvidia GeForce RTX 2080</option>
                                    <option value="Nvidia GeForce RTX 2070" <?php if ($game->game_recommended_graphics == "Nvidia GeForce RTX 2070") echo ("Selected") ?>>Nvidia GeForce RTX 2070</option>
                                    <option value="Nvidia GeForce RTX 2060" <?php if ($game->game_recommended_graphics == "Nvidia GeForce RTX 2060") echo ("Selected") ?>>Nvidia GeForce RTX 2060</option>
                                    <option value="Nvidia GeForce GTX 1080 Ti" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 1080 Ti") echo ("Selected") ?>>Nvidia GeForce GTX 1080 Ti</option>
                                    <option value="Nvidia GeForce GTX 1080" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 1080") echo ("Selected") ?>>Nvidia GeForce GTX 1080</option>
                                    <option value="Nvidia GeForce GTX 1070" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 1070") echo ("Selected") ?>>Nvidia GeForce GTX 1070</option>
                                    <option value="Nvidia GeForce GTX 1060" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 1060") echo ("Selected") ?>>Nvidia GeForce GTX 1060</option>
                                    <option value="Nvidia GeForce GTX 1050" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 1050") echo ("Selected") ?>>Nvidia GeForce GTX 1050</option>
                                    <option value="Nvidia GeForce GTX 1650 Super" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 1650 Super") echo ("Selected") ?>>Nvidia GeForce GTX 1650 Super</option>
                                    <option value="Nvidia GeForce GTX 1660 Ti" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 1660 Ti") echo ("Selected") ?>>Nvidia GeForce GTX 1660 Ti</option>
                                    <option value="Nvidia GeForce GT 1030" <?php if ($game->game_recommended_graphics == "Nvidia GeForce RTX GT 1030") echo ("Selected") ?>>Nvidia GeForce GT 1030</option>
                                    <option value="Nvidia GeForce GTX 980 Ti" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 980 Ti") echo ("Selected") ?>>Nvidia GeForce GTX 980 Ti</option>
                                    <option value="Nvidia GeForce GTX 980" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 980") echo ("Selected") ?>>Nvidia GeForce GTX 980</option>
                                    <option value="Nvidia GeForce GTX 970" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 970") echo ("Selected") ?>>Nvidia GeForce GTX 970</option>
                                    <option value="Nvidia GeForce GTX 960" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 960") echo ("Selected") ?>>Nvidia GeForce GTX 960</option>
                                    <option value="Nvidia GeForce GTX 950" <?php if ($game->game_recommended_graphics == "Nvidia GeForce GTX 950") echo ("Selected") ?>>Nvidia GeForce GTX 950</option>
                                    <option value="AMD Radeon RX 6800 XT" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 6900 XT") echo ("Selected") ?>>AMD Radeon RX 6900 XT</option>
                                    <option value="AMD Radeon RX 6800 XT" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 6800 XT") echo ("Selected") ?>>AMD Radeon RX 6800 XT</option>
                                    <option value="AMD Radeon RX 6800 XT" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 6700 XT") echo ("Selected") ?>>AMD Radeon RX 6700 XT</option>
                                    <option value="AMD Radeon RX 5700 XT" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 5700 XT") echo ("Selected") ?>>AMD Radeon RX 5700 XT</option>
                                    <option value="AMD Radeon RX 5500 XT 8GB" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 5500 XT 8GB") echo ("Selected") ?>>AMD Radeon RX 5500 XT 8GB</option>
                                    <option value="AMD Radeon RX Vega 64" <?php if ($game->game_recommended_graphics == "AMD Radeon RX Vega 64") echo ("Selected") ?>>AMD Radeon RX Vega 64</option>
                                    <option value="AMD Radeon R9 390" <?php if ($game->game_recommended_graphics == "AMD Radeon R9 390") echo ("Selected") ?>>AMD Radeon R9 390</option>
                                    <option value="AMD Radeon RX 590" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 590") echo ("Selected") ?>>AMD Radeon RX 590</option>
                                    <option value="AMD Radeon RX 580" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 580") echo ("Selected") ?>>AMD Radeon RX 580</option>
                                    <option value="AMD Radeon RX 570" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 570") echo ("Selected") ?>>AMD Radeon RX 570</option>
                                    <option value="AMD Radeon RX 560" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 560") echo ("Selected") ?>>AMD Radeon RX 560</option>
                                    <option value="AMD Radeon RX 550" <?php if ($game->game_recommended_graphics == "AMD Radeon RX 550") echo ("Selected") ?>>AMD Radeon RX 550</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">DirectX</td>
                            <td>
                                <select class="directx" style="width:100%" name="directxRec">
                                    <option></option>
                                    <option value="Version 9" <?php if ($game->game_recommended_directx == "Version 9") echo ("Selected") ?>>Version 9</option>
                                    <option value="Version 10" <?php if ($game->game_recommended_directx == "Version 10") echo ("Selected") ?>>Version 10</option>
                                    <option value="Version 11" <?php if ($game->game_recommended_directx == "Version 11") echo ("Selected") ?>>Version 11</option>
                                    <option value="Version 12" <?php if ($game->game_recommended_directx == "Version 12") echo ("Selected") ?>>Version 12</option>
                                </select>
                            </td>
                            <td><select class="directx" style="width:100%" name="directxMin">
                                    <option></option>
                                    <option value="Version 9" <?php if ($game->game_min_directx == "Version 9") echo ("Selected") ?>>Version 9</option>
                                    <option value="Version 10" <?php if ($game->game_min_directx == "Version 10") echo ("Selected") ?>>Version 10</option>
                                    <option value="Version 11" <?php if ($game->game_min_directx == "Version 11") echo ("Selected") ?>>Version 11</option>
                                    <option value="Version 12" <?php if ($game->game_min_directx == "Version 12") echo ("Selected") ?>>Version 12</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);" for="storage">Storage</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="number" value="<?= $game->game_recommended_storage ?>" name="storage" placeholder="In GB" require=""></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Additional Notes</label></div>
                <div class="col-sm-6 input-column"><textarea class="form-control" name="additionalNotes" placeholder="Optional"><?= $game->game_additional_notes ?></textarea></div>
            </div>


            <input type="hidden" value="<?= $game->game_id ?>" name="game_id">
            <button class="btn btn-danger submit-button" id="submit" type="submit" name="updateRequirments">Update Requirments</button>

        </form>
    </div>
</div>
<div class="row register-form" style="margin-right: 0;margin-left: 0; align-items: center;">
    <div class="col-md-8 offset-md-2" id="discount">
        <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data">
            <h1 style="color: rgb(255,255,255);">Discount</h1>

            <div class="col-sm-6 input-column text-center" style="margin-left: 25%;">
                <label class="col-form-label" style="color: rgb(255,255,255);">Update the discount of the game</label>
                <input type="hidden" name="game_id" value="<?= $game->game_id ?>">
                <input class="form-control" type="number" min="0" max="100" id="discountValue" name="discount" title="Setting this to 0 will remove the discount" placeholder="Discount value in percentage (%)" required value="<?= $game->game_discount ?>">
                <label class="col-form-label" style="color: rgb(255,255,255);">New price will be : <span id="dp" style="color:red"><?= $game->getDiscountedPrice() ?></span> $ </label>
            </div>
            <button class="btn btn-danger submit-button" id="submit" type="submit" name="updateDiscount">Update</button>
        </form>
    </div>
</div>
<div class="row register-form" style="margin-right: 0;margin-left: 0; align-items: center;">
    <div class="col-md-8 offset-md-2" id="changeFranchise">
        <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data">
            <h1 style="color: rgb(255,255,255);">Franchise info</h1>
            <div>
                <button type="button" onclick="displayCreateFranchise();"><i class="fas fa-plus"></i> Create new Franchise</button>
            </div>

            <div class="col-sm-6 input-column" style="margin-left: 25%;">
                <label class="col-form-label" style="color: rgb(255,255,255);">Change Game Franchise</label>
                <input type="hidden" name="game_id" value="<?= $game->game_id ?>">
                <select class="franchises" style="width:100%" name="franchise_id">
                    <option value="-1">None</option>

                    <?php if (isset($franchises)) {
                        foreach ($franchises as $fr) {
                    ?>
                            <option value="<?= $fr->franchise_id ?>" <?php if ($franchise != null) if ($franchise["franchise_name"] === $fr->franchise_name) echo ("Selected"); ?>><?= $fr->franchise_name ?></option>
                    <?php
                        }
                    } ?>

                </select>
            </div>
            <button class="btn btn-danger submit-button" id="submit" type="submit" name="EditFranchise">Update Franchise</button>
        </form>
    </div>




    <div class="col-md-8 offset-md-2" id="createFranchise">
        <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data">
            <h1 style="color: rgb(255,255,255);">Franchise info</h1>
            <div>
                <button onclick="displayChangeFranchise();" type="button"><i class="fas fa-plus"></i> Change Existing franchise</button>
            </div>

            <div class="col-sm-6 input-column text-center" style="margin-left: 25%;">
                <label class="col-form-label" style="color: rgb(255,255,255);">Create new franchise</label>
                <input type="hidden" name="game_id" value="<?= $game->game_id ?>">
                <input class="form-control" type="text" name="franchise_name" title="Current game would be added to new franchise" placeholder="Franchise name" required>

            </div>
            <button class="btn btn-danger submit-button" id="submit" type="submit" name="createFranchise">Create new franchise</button>
        </form>
    </div>

</div>


<div class="row register-form" style="margin-right: 0;margin-left: 0; align-items: center;">
    <div class="col-md-8 offset-md-2" id="changeFranchise">
        <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data">
            <h1 style="color: rgb(255,255,255);">Images &amp; Videos</h1>
            <div class="alert alert-danger" role="alert" style="width: 100%;">
                Uploading new media will overwrite previous files !
            </div>
            <input type="hidden" name="game_folder" value="<?= $game->game_folder; ?>">
            <div class="form-row form-group">
                <div class="col-sm-3 align-self-sm-center label-column"><label class="col-form-label" style="color: rgb(255,255,255);">In-game shots</label></div>
                <div class="col-sm-9 text-left align-self-center input-column"><input type="file" id="imgInp" size="40" name="images[]" style="margin-right:3em;margin-left:1em" object-fit="contain" multiple="" required accept="image/png, image/jpeg"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 align-self-sm-center label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Videos</label></div>
                <div class="col-sm-9 text-left align-self-center input-column"><input type="file" id="imgInp" size="40" name="video" style="margin-right:3em;margin-left:1em" object-fit="contain" required accept="video/*"></div>
            </div>
            <button class="btn btn-danger submit-button" id="submit" type="submit" name="updateMedia">Upload New Media</button>
        </form>
    </div>
</div>



<div class="row register-form" style="margin-right: 0;margin-left: 0; align-items: center;">
    <div class="col-md-8 offset-md-2" id="changeFranchise">
        <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data">
            <h1 style="color: rgb(255,255,255);">Media links</h1>



            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Facebook Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="facebook" value="<?= $game->game_facebook_link ?>" placeholder="Optional"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Youtube Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="youtube" placeholder="Optional" value="<?= $game->game_youtube_link ?>"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Twitter Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="twitter" placeholder="Optional" value="<?= $game->game_twitter_link ?>"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Twitch Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="twitch" placeholder="Optional" value="<?= $game->game_twitch_link ?>"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Website Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="website" placeholder="Optional" value="<?= $game->game_website_link ?>"></div>
            </div>
            <input type="hidden" name="game_id" value="<?= $game->game_id ?>">
            <button class="btn btn-danger submit-button" id="submit" type="submit" name="editSocialLinks">Edit Media links</button>


        </form>
    </div>
</div>


<div class="row register-form" style="margin-right: 0;margin-left: 0; align-items: center;">
    <div class="col-md-8 offset-md-2" id="changeFranchise">
        <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data">
            <h1 style="color: red;">GAME DELETION</h1>
            <div class="alert alert-danger" role="alert" style="width: 100%;">
                This game and all it's files would be deleted from the server, this action cannot be reverted !
            </div>
            <input type="hidden" name="game_folder" value="<?= $game->game_folder ?>">
            <input type="hidden" name="delete_id" value="<?= $game->game_id ?>">
            <button type="submit" class="btn-danger" name="deleteGame">Delete Game</button>
        </form>
    </div>
</div>



<script src="<?= GameHeaven ?>views/assets/wysiwyg/js/yseditor.js"></script>
<script src="<?= GameHeaven ?>views/assets/tagify/jQuery.tagify.min.js"></script>
<script src="<?= GameHeaven ?>views/assets/tagify/tagify.min.js"></script>
<script src="<?= GameHeaven ?>views/assets/tagify/tagify.polyfills.min.js"></script>


<script>
    function displayCreateFranchise() {
        $("#changeFranchise").hide(1000);
        $("#createFranchise").show(1000);
    }

    function displayChangeFranchise() {
        $("#changeFranchise").show(1000);
        $("#createFranchise").hide(1000);
    }

    displayChangeFranchise();
</script>


<script>
    var myEditor = new ysEditor();

    function send() {
        document.querySelector("#hidden").value = myEditor.getHTML();
        return true;
    }
</script>

<script>
    $("#discountValue").on("input", function() {
        var val = $(this).val();
        var price = <?=$game->game_price?>*(1-val/100).toFixed(2);
        $("#dp").html(price);
    });

    function showHR() {
        if ($("#HR").is(":visible") && !$("#windowsP").is(":checked")) {
            $("#HR").hide(1000);
        } else {
            $("#HR").show(1000);
        }
    }
    showHR();
    var inputElm = document.querySelector('input[name=input]'),
        whitelist = ["Action", "Platformer", "Shooter", "Fighting", "Stealth", "Survival", "Battle Royale", "Adventure", "Horror", "RPG", "MMORPG", "First-person", "Simulation", "Vehicle", "Strategy", "Tower defense", "Turn-based", "Sports", "Racing", "MMO", "Board", "Card", "Casual", "Idle", "Logic", "Sandbox", "Open world", "Puzzle", "Indie"];


    // initialize Tagify on the above input node reference
    var tagify = new Tagify(inputElm, {
        enforceWhitelist: true,
        whitelist: inputElm.value.trim().split(/\s*,\s*/) // Array of values. stackoverflow.com/a/43375571/104380
    })



    // "remove all tags" button event listener
    document.querySelector('.tags--removeAllBtn')
        .addEventListener('click', tagify.removeAllTags.bind(tagify))

    // Chainable event listeners
    tagify.on('add', onAddTag)
        .on('remove', onRemoveTag)
        .on('input', onInput)
        .on('edit', onTagEdit)
        .on('invalid', onInvalidTag)
        .on('click', onTagClick)
        .on('focus', onTagifyFocusBlur)
        .on('blur', onTagifyFocusBlur)
        .on('dropdown:hide dropdown:show', e => console.log(e.type))
        .on('dropdown:select', onDropdownSelect)

    var mockAjax = (function mockAjax() {
        var timeout;
        return function(duration) {
            clearTimeout(timeout); // abort last request
            return new Promise(function(resolve, reject) {
                timeout = setTimeout(resolve, duration || 700, whitelist)
            })
        }
    })()

    // tag added callback
    function onAddTag(e) {
        console.log("onAddTag: ", e.detail);
        console.log("original input value: ", inputElm.value)
        tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
    }

    // tag remvoed callback
    function onRemoveTag(e) {
        console.log("onRemoveTag:", e.detail, "tagify instance value:", tagify.value)
    }

    // on character(s) added/removed (user is typing/deleting)
    function onInput(e) {
        console.log("onInput: ", e.detail);
        tagify.settings.whitelist.length = 0; // reset current whitelist
        tagify.loading(true) // show the loader animation

        // get new whitelist from a delayed mocked request (Promise)
        mockAjax()
            .then(function(result) {
                // replace tagify "whitelist" array values with new values
                // and add back the ones already choses as Tags
                tagify.settings.whitelist.push(...result, ...tagify.value)

                tagify
                    .loading(false)
                    // render the suggestions dropdown.
                    .dropdown.show.call(tagify, e.detail.value);
            })
            .catch(err => tagify.dropdown.hide.call(tagify))
    }

    function onTagEdit(e) {
        console.log("onTagEdit: ", e.detail);
    }

    // invalid tag added callback
    function onInvalidTag(e) {
        console.log("onInvalidTag: ", e.detail);
    }

    // invalid tag added callback
    function onTagClick(e) {
        console.log(e.detail);
        console.log("onTagClick: ", e.detail);
    }

    function onTagifyFocusBlur(e) {
        console.log(e.type, "event fired")
    }

    function onDropdownSelect(e) {
        console.log("onDropdownSelect: ", e.detail)
    }
</script>