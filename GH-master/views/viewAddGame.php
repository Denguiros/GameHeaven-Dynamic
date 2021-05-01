<?php

$this->_t = $publisher->publisher_name . " Adding game";

?>
<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/tagify/tagify.css">

<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/wysiwyg/css/yseditor.css" />



<div class="row register-form" style="margin-right: 0;margin-left: 0;">
    <div class="col-md-8 offset-md-2">
        <form class="text-center custom-form" style="background-color: rgba(255,255,255,0);" method="post" enctype="multipart/form-data" id="addGameForm" onsubmit="return send();">



            <h1 style="color: rgb(255,255,255);">Add a game</h1>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" for="title" style="color: rgb(255,255,255);">Title</label></div>
                <div class="col-sm-6 input-column">
                    <input class="form-control" type="text" name="title" required placeholder="Game title"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" for="releaseDate" style="color: rgb(255,255,255);">Release
                        Date</label></div>
                <div class="col-sm-6 input-column">
                    <input class="form-control" type="date" name="releaseDate" required></div>
            </div>

            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" style="color: rgb(255,255,255);">Franchise name</label></div>
                <div class="col-sm-6 input-column">
                    <input class="form-control" type="text" name="franchise" placeholder="Optional"></div>
            </div>

            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" style="color: rgb(255,255,255);">Choose already existing
                        franchise</label></div>
                <div class="col-sm-6 input-column">


                    <select class="franchises" style="width:100%" name="old_franchise">
                        <option></option>
                        <?php if (isset($franchises)) {
                            foreach ($franchises as $fr) {
                        ?>
                                <option value="<?= $fr->franchise_id ?>"><?= $fr->franchise_name ?></option>
                        <?php
                            }
                        } ?>

                    </select>


                </div>
            </div>

            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" for="genres" style="color: rgb(255,255,255);">Genres</label></div>

                <div class="col-sm-6 input-column">
                    <input name='input' class='some_class_name' placeholder='write some tags' value='' data-blacklist='' required>
                    <button class='tags--removeAllBtn' type='button'>Remove all Genres ⬆</button>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" for="price" style="color: rgb(255,255,255);">Price</label></div>
                <div class="col-sm-6 input-column">
                    <input class="form-control" type="number" name="price" placeholder="In $" required></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" style="color: rgb(255,255,255);">Pegi rating</label></div>
                <div class="col-sm-6 input-column">
                    <select class="pegi" style="width:100%" name="pegi" required>
                        <option></option>
                        <option value="1">3</option>
                        <option value="2">7</option>
                        <option value="3">12</option>
                        <option value="4">16</option>
                        <option value="5">18</option>
                    </select>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" style="color: rgb(255,255,255); text-align: center;font-size: 23px;">Description</label></div>

                <div id="yseditor"></div>
                <input type="hidden" name="description" id="hidden" required/>



            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column">
                    <label class="col-form-label" style="color: rgb(255,255,255);">Platforms</label></div>
                <div class="col-sm-6 input-column" id="platforms">

                    <div class="form-check" style="color: rgb(255,255,255);"><input class="form-check-input" type="checkbox" id="windowsP" name="platforms[]" value="windows" onclick="showHR()"><label class="form-check-label" for="windowsP">Windows</label></div>
                    <div class="form-check" style="color: rgb(255,255,255);"><input class="form-check-input" type="checkbox" id="xboxP" name="platforms[]" value="xbox" ><label class="form-check-label" for="xboxP">Xbox one</label></div>

                    <div class="form-check" style="color: rgb(255,255,255);"><input class="form-check-input" type="checkbox" id="playstationP" name="platforms[]" value="playstation"><label class="form-check-label" for="playstationP">Playstation 4</label></div>
                </div>
            </div>

            <h1 style="color: rgb(255,255,255);margin-top: 60px;">Images &amp; Videos</h1>
            <div class="form-row form-group">
                <div class="col-sm-3 align-self-sm-center label-column"><label class="col-form-label" style="color: rgb(255,255,255);">In-game shots</label></div>
                <div class="col-sm-9 text-left align-self-center input-column"><input type="file" id="imgInp" size="40" name="images[]" style="margin-right:3em;margin-left:1em" object-fit="contain" multiple="" required accept="image/png, image/jpeg, image/jpg"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 align-self-sm-center label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Trailer</label></div>
                <div class="col-sm-9 text-left align-self-center input-column"><input type="file" id="vidInp" size="40" name="video" style="margin-right:3em;margin-left:1em" object-fit="contain" required accept="video/*"></div>
            </div>
            <div id="HR" style="display:none">
                <h1 style="color: rgb(255,255,255);margin-top: 60px;">Hardware requirements</h1>
                <div class="table-responsive" style="color: rgb(255,255,255);">
                    <table class="table" style="font-weight: bold;" >
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
                                    <select class="os" name="osMin" style="width: 100%;" >
                                        <option></option>
                                        <option value="Windows XP">Windows XP</option>
                                        <option value="Windows 7">Windows 7</option>
                                        <option value="Windows 8">Windows 8</option>
                                        <option value="Windows 10">Windows 10</option>

                                    </select>
                                </td>
                                <td class="text-center"><select class="os" style="width:100%" name="osRec" >
                                        <option></option>
                                        <option value="Windows XP">Windows XP</option>
                                        <option value="Windows 7">Windows 7</option>
                                        <option value="Windows 8">Windows 8</option>
                                        <option value="Windows 10">Windows 10</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>


                            <tr>
                                <td class="text-center">Processor </td>
                                <td>
                                    <select class="processor" style="width:100%" name="processorMin" >
                                        <option></option>
                                        <option value="i9-10900">i9-10900</option>
                                        <option value="i9-10850">i9-10850</option>
                                        <option value="i7-10700">i7-10700</option>
                                        <option value="i5-10600">i5-10600</option>
                                        <option value="i5-10400">i5-10400</option>
                                        <option value="i3-10300">i3-10300</option>
                                        <option value="i3-10100">i3-10100</option>
                                        <option value="i9-9900">i9-9900</option>
                                        <option value="i7-9700">i7-9700</option>
                                        <option value="i5-9600">i5-9600</option>
                                        <option value="i5-9400">i5-9400</option>
                                        <option value="i3-9100">i3-9100</option>
                                        <option value="i7-8750">i7-8750</option>
                                        <option value="i5-8500">i5-8500</option>
                                        <option value="i5-8400">i5-8400</option>
                                        <option value="i3-8145">i3-8145</option>
                                        <option value="i3-8130">i3-8130</option>
                                        <option value="i3-8100">i3-8100</option>
                                        <option value="i9-7980">i9-7980</option>
                                        <option value="i9-7900">i9-7900</option>
                                        <option value="i7-7700">i7-7700</option>
                                        <option value="i5-7600">i5-7600</option>
                                        <option value="i5-7500">i5-7500</option>
                                        <option value="i3-7300">i3-7300</option>
                                        <option value="G4620">G4620</option>
                                        <option value="G4600">G4600</option>
                                        <option value="G4560">G4560</option>
                                        <option value="G3950">G3950</option>
                                        <option value="Ryzen 3 1200">Ryzen 3 1200</option>
                                        <option value="Ryzen 5 1400">Ryzen 5 1400</option>
                                        <option value="Ryzen 5 1600">Ryzen 5 1600</option>
                                        <option value="Ryzen 7 1700">Ryzen 7 1700</option>
                                        <option value="Ryzen 7 1800 X">Ryzen 7 1800 X </option>
                                        <option value="Ryzen Threadripper 1900X">Ryzen Threadripper 1900X</option>
                                        <option value="Ryzen 3 2300">Ryzen 3 2300</option>
                                        <option value="Ryzen 5 2600">Ryzen 5 2600</option>
                                        <option value="Ryzen 7 2700">Ryzen 7 2700</option>
                                        <option value="Ryzen 3 3100">Ryzen 3 3100</option>
                                        <option value="Ryzen 5 3500">Ryzen 5 3500</option>
                                        <option value="Ryzen 5 3600">Ryzen 5 3600</option>
                                        <option value="Ryzen 7 3700X">Ryzen 7 3700X</option>
                                        <option value="Ryzen 7 3800X">Ryzen 7 3800X</option>
                                        <option value="Ryzen 9 3900">Ryzen 9 3900</option>
                                        <option value="Ryzen 9 3950X">Ryzen 9 3950X</option>
                                        <option value="Ryzen Threadripper 3990X">Ryzen Threadripper 3990X</option>
                                        <option value="Ryzen 5 5600X">Ryzen 5 5600X</option>
                                        <option value="Ryzen 7 5800X">Ryzen 7 5800X</option>
                                        <option value="Ryzen 9 5900X">Ryzen 9 5900X</option>
                                        <option value="FX-4100">FX-4100</option>
                                        <option value="FX-6100">FX-6100</option>
                                        <option value="FX-8100">FX-8100</option>
                                        <option value="FX-4300">FX-4300</option>
                                        <option value="FX-6300">FX-6300</option>
                                        <option value="FX-8300">FX-8300</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <select class="processor" style="width:100%" name="processorRec" >
                                        <option></option>
                                        <option value="i9-10900">i9-10900</option>
                                        <option value="i9-10850">i9-10850</option>
                                        <option value="i7-10700">i7-10700</option>
                                        <option value="i5-10600">i5-10600</option>
                                        <option value="i5-10400">i5-10400</option>
                                        <option value="i3-10300">i3-10300</option>
                                        <option value="i3-10100">i3-10100</option>
                                        <option value="i9-9900">i9-9900</option>
                                        <option value="i7-9700">i7-9700</option>
                                        <option value="i5-9600">i5-9600</option>
                                        <option value="i5-9400">i5-9400</option>
                                        <option value="i3-9100">i3-9100</option>
                                        <option value="i7-8750">i7-8750</option>
                                        <option value="i5-8500">i5-8500</option>
                                        <option value="i5-8400">i5-8400</option>
                                        <option value="i3-8145">i3-8145</option>
                                        <option value="i3-8130">i3-8130</option>
                                        <option value="i3-8100">i3-8100</option>
                                        <option value="i9-7980">i9-7980</option>
                                        <option value="i9-7900">i9-7900</option>
                                        <option value="i7-7700">i7-7700</option>
                                        <option value="i5-7600">i5-7600</option>
                                        <option value="i5-7500">i5-7500</option>
                                        <option value="i3-7300">i3-7300</option>
                                        <option value="G4620">G4620</option>
                                        <option value="G4600">G4600</option>
                                        <option value="G4560">G4560</option>
                                        <option value="G3950">G3950</option>
                                        <option value="Ryzen 3 1200">Ryzen 3 1200</option>
                                        <option value="Ryzen 5 1400">Ryzen 5 1400</option>
                                        <option value="Ryzen 5 1600">Ryzen 5 1600</option>
                                        <option value="Ryzen 7 1700">Ryzen 7 1700</option>
                                        <option value="Ryzen 7 1800 X">Ryzen 7 1800 X </option>
                                        <option value="Ryzen Threadripper 1900X">Ryzen Threadripper 1900X</option>
                                        <option value="Ryzen 3 2300">Ryzen 3 2300</option>
                                        <option value="Ryzen 5 2600">Ryzen 5 2600</option>
                                        <option value="Ryzen 7 2700">Ryzen 7 2700</option>
                                        <option value="Ryzen 3 3100">Ryzen 3 3100</option>
                                        <option value="Ryzen 5 3500">Ryzen 5 3500</option>
                                        <option value="Ryzen 5 3600">Ryzen 5 3600</option>
                                        <option value="Ryzen 7 3700X">Ryzen 7 3700X</option>
                                        <option value="Ryzen 7 3800X">Ryzen 7 3800X</option>
                                        <option value="Ryzen 9 3900">Ryzen 9 3900</option>
                                        <option value="Ryzen 9 3950X">Ryzen 9 3950X</option>
                                        <option value="Ryzen Threadripper 3990X">Ryzen Threadripper 3990X</option>
                                        <option value="Ryzen 5 5600X">Ryzen 5 5600X</option>
                                        <option value="Ryzen 7 5800X">Ryzen 7 5800X</option>
                                        <option value="Ryzen 9 5900X">Ryzen 9 5900X</option>
                                        <option value="FX-4100">FX-4100</option>
                                        <option value="FX-6100">FX-6100</option>
                                        <option value="FX-8100">FX-8100</option>
                                        <option value="FX-4300">FX-4300</option>
                                        <option value="FX-6300">FX-6300</option>
                                        <option value="FX-8300">FX-8300</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Ram </td>
                                <td>
                                    <select class="ram" style="width:100%" name="ramMin" >
                                        <option></option>
                                        <option value="1GB">1GB</option>
                                        <option value="2GB">2GB</option>
                                        <option value="4GB">4GB</option>
                                        <option value="8GB">8GB</option>
                                        <option value="16GB">16GB</option>
                                        <option value="32GB">32GB</option>
                                        <option value="64GB">64GB</option>
                                    </select>
                                </td>
                                <td><select class="ram" style="width:100%" name="ramRec" >
                                        <option></option>
                                        <option value="1GB">1GB</option>
                                        <option value="2GB">2GB</option>
                                        <option value="4GB">4GB</option>
                                        <option value="8GB">8GB</option>
                                        <option value="16GB">16GB</option>
                                        <option value="32GB">32GB</option>
                                        <option value="64GB">64GB</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Graphics </td>
                                <td>
                                    <select class="gpu" style="width:100%" name="graphicsMin" >
                                        <option></option>
                                        <option value="Nvidia GeForce RTX 3090">Nvidia GeForce RTX 3090</option>
                                        <option value="Nvidia GeForce RTX 3080">Nvidia GeForce RTX 3080</option>
                                        <option value="Nvidia GeForce RTX 3070">Nvidia GeForce RTX 3070</option>
                                        <option value="Nvidia GeForce RTX 3060">Nvidia GeForce RTX 3060</option>
                                        <option value="Nvidia GeForce RTX 2080 Ti">Nvidia GeForce RTX 2080 Ti</option>
                                        <option value="Nvidia GeForce RTX 2080">Nvidia GeForce RTX 2080</option>
                                        <option value="Nvidia GeForce RTX 2070">Nvidia GeForce RTX 2070</option>
                                        <option value="Nvidia GeForce RTX 2060">Nvidia GeForce RTX 2060</option>
                                        <option value="Nvidia GeForce GTX 1080 Ti">Nvidia GeForce GTX 1080 Ti</option>
                                        <option value="Nvidia GeForce GTX 1080">Nvidia GeForce GTX 1080</option>
                                        <option value="Nvidia GeForce GTX 1070">Nvidia GeForce GTX 1070</option>
                                        <option value="Nvidia GeForce GTX 1060">Nvidia GeForce GTX 1060</option>
                                        <option value="Nvidia GeForce GTX 1050">Nvidia GeForce GTX 1050</option>
                                        <option value="Nvidia GeForce GTX 1650 Super">Nvidia GeForce GTX 1650 Super</option>
                                        <option value="Nvidia GeForce GTX 1660 Ti">Nvidia GeForce GTX 1660 Ti</option>
                                        <option value="Nvidia GeForce GT 1030">Nvidia GeForce GT 1030</option>
                                        <option value="Nvidia GeForce GTX 980 Ti">Nvidia GeForce GTX 980 Ti</option>
                                        <option value="Nvidia GeForce GTX 980">Nvidia GeForce GTX 980</option>
                                        <option value="Nvidia GeForce GTX 970">Nvidia GeForce GTX 970</option>
                                        <option value="Nvidia GeForce GTX 960">Nvidia GeForce GTX 960</option>
                                        <option value="Nvidia GeForce GTX 950">Nvidia GeForce GTX 950</option>
                                        <option value="AMD Radeon RX 6800 XT">AMD Radeon RX 6900 XT</option>
                                        <option value="AMD Radeon RX 6800 XT">AMD Radeon RX 6800 XT</option>
                                        <option value="AMD Radeon RX 6800 XT">AMD Radeon RX 6700 XT</option>
                                        <option value="AMD Radeon RX 5700 XT">AMD Radeon RX 5700 XT</option>
                                        <option value="AMD Radeon RX 5500 XT 8GB">AMD Radeon RX 5500 XT 8GB</option>
                                        <option value="AMD Radeon RX Vega 64">AMD Radeon RX Vega 64</option>
                                        <option value="AMD Radeon R9 390">AMD Radeon R9 390</option>
                                        <option value="AMD Radeon RX 590">AMD Radeon RX 590</option>
                                        <option value="AMD Radeon RX 580">AMD Radeon RX 580</option>
                                        <option value="AMD Radeon RX 570">AMD Radeon RX 570</option>
                                        <option value="AMD Radeon RX 560">AMD Radeon RX 560</option>
                                        <option value="AMD Radeon RX 550">AMD Radeon RX 550</option>
                                    </select>
                                </td>
                                <td><select class="gpu" style="width:100%" name="graphicsRec" >
                                        <option></option>
                                        <option value="Nvidia GeForce RTX 3090">Nvidia GeForce RTX 3090</option>
                                        <option value="Nvidia GeForce RTX 3080">Nvidia GeForce RTX 3080</option>
                                        <option value="Nvidia GeForce RTX 3070">Nvidia GeForce RTX 3070</option>
                                        <option value="Nvidia GeForce RTX 3060">Nvidia GeForce RTX 3060</option>
                                        <option value="Nvidia GeForce RTX 2080 Ti">Nvidia GeForce RTX 2080 Ti</option>
                                        <option value="Nvidia GeForce RTX 2080">Nvidia GeForce RTX 2080</option>
                                        <option value="Nvidia GeForce RTX 2070">Nvidia GeForce RTX 2070</option>
                                        <option value="Nvidia GeForce RTX 2060">Nvidia GeForce RTX 2060</option>
                                        <option value="Nvidia GeForce GTX 1080 Ti">Nvidia GeForce GTX 1080 Ti</option>
                                        <option value="Nvidia GeForce GTX 1080">Nvidia GeForce GTX 1080</option>
                                        <option value="Nvidia GeForce GTX 1070">Nvidia GeForce GTX 1070</option>
                                        <option value="Nvidia GeForce GTX 1060">Nvidia GeForce GTX 1060</option>
                                        <option value="Nvidia GeForce GTX 1050">Nvidia GeForce GTX 1050</option>
                                        <option value="Nvidia GeForce GTX 1650 Super">Nvidia GeForce GTX 1650 Super</option>
                                        <option value="Nvidia GeForce GTX 1660 Ti">Nvidia GeForce GTX 1660 Ti</option>
                                        <option value="Nvidia GeForce GT 1030">Nvidia GeForce GT 1030</option>
                                        <option value="Nvidia GeForce GTX 980 Ti">Nvidia GeForce GTX 980 Ti</option>
                                        <option value="Nvidia GeForce GTX 980">Nvidia GeForce GTX 980</option>
                                        <option value="Nvidia GeForce GTX 970">Nvidia GeForce GTX 970</option>
                                        <option value="Nvidia GeForce GTX 960">Nvidia GeForce GTX 960</option>
                                        <option value="Nvidia GeForce GTX 950">Nvidia GeForce GTX 950</option>
                                        <option value="AMD Radeon RX 6800 XT">AMD Radeon RX 6900 XT</option>
                                        <option value="AMD Radeon RX 6800 XT">AMD Radeon RX 6800 XT</option>
                                        <option value="AMD Radeon RX 6800 XT">AMD Radeon RX 6700 XT</option>
                                        <option value="AMD Radeon RX 5700 XT">AMD Radeon RX 5700 XT</option>
                                        <option value="AMD Radeon RX 5500 XT 8GB">AMD Radeon RX 5500 XT 8GB</option>
                                        <option value="AMD Radeon RX Vega 64">AMD Radeon RX Vega 64</option>
                                        <option value="AMD Radeon R9 390">AMD Radeon R9 390</option>
                                        <option value="AMD Radeon RX 590">AMD Radeon RX 590</option>
                                        <option value="AMD Radeon RX 580">AMD Radeon RX 580</option>
                                        <option value="AMD Radeon RX 570">AMD Radeon RX 570</option>
                                        <option value="AMD Radeon RX 560">AMD Radeon RX 560</option>
                                        <option value="AMD Radeon RX 550">AMD Radeon RX 550</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">DirectX</td>
                                <td>
                                    <select class="directx" style="width:100%" name="directxRec" >
                                        <option></option>
                                        <option value="Version 9">Version 9</option>
                                        <option value="Version 10">Version 10</option>
                                        <option value="Version 11">Version 11</option>
                                        <option value="Version 12">Version 12</option>
                                    </select>
                                </td>
                                <td><select class="directx" style="width:100%" name="directxMin" >
                                        <option></option>
                                        <option value="Version 9">Version 9</option>
                                        <option value="Version 10">Version 10</option>
                                        <option value="Version 11">Version 11</option>
                                        <option value="Version 12">Version 12</option>
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
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="storage" id="storage" placeholder="In GB" ></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Additional Notes</label></div>
                    <div class="col-sm-6 input-column"><textarea class="form-control" name="additionalNotes" placeholder="Optional"></textarea></div>
                </div>
            </div>
            <h1 style="color: rgb(255,255,255);margin-top: 60px;">Media</h1>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Facebook Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="facebook" placeholder="Optional"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Youtube Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="youtube" placeholder="Optional"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Twitter Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="twitter" placeholder="Optional"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Twitch
                        Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="twitch" placeholder="Optional"></div>
            </div>
            <div class="form-row form-group">
                <div class="col-sm-3 label-column"><label class="col-form-label" style="color: rgb(255,255,255);">Website Link</label></div>
                <div class="col-sm-6 input-column"><input class="form-control" type="text" name="website" placeholder="Optional"></div>
            </div>

            <button class="btn btn-danger submit-button" id="submit" type="submit" name="addGame" >Add game for
                approval</button>






        </form>
    </div>
</div>







<script src="<?= GameHeaven ?>views/assets/wysiwyg/js/yseditor.js"></script>
<script src="<?= GameHeaven ?>views/assets/tagify/jQuery.tagify.min.js"></script>
<script src="<?= GameHeaven ?>views/assets/tagify/tagify.min.js"></script>
<script src="<?= GameHeaven ?>views/assets/tagify/tagify.polyfills.min.js"></script>



<script>
    var myEditor = new ysEditor();

    function send() {
        document.querySelector("#hidden").value = myEditor.getHTML();
        return true;
    }
</script>
<script type="text/javascript">
    function showHR()
    {
        if($("#HR").is(":visible"))
        {
            $("#HR").hide(1000);
            $("#HR").find("select").each(function()
            {
                $(this).attr('required', false);
            });
            $("#storage").attr('required', false);
        }
        else
        {
            $("#HR").show(1000);
            $("#HR").find("select").each(function()
            {
                $(this).attr('required', true);
            });
            $("#storage").attr('required', true);
        }
    }
    $('#submit').on("click",function() {
      platformsChecked = $("#platforms").find("input[type=checkbox]:checked");
      if(!platformsChecked.length) {
        alert("You must check at least one platform to your game.");
        return false;
      }
      var $fileUpload = $("#imgInp");
        if (parseInt($fileUpload.get(0).files.length)>6 || parseInt($fileUpload.get(0).files.length)<4 ){
         alert("You can only upload a maximum of 6 images and a minimum of 4 images");
         return false;
        }

    });
</script>
<script>


    var inputElm = document.querySelector('input[name=input]'),
        whitelist = ["Action", "Platformer", "Shooter", "Fighting", "Stealth", "Survival", "Battle-Royale", "Adventure",
            "Horror", "RPG", "MMORPG", "First-person", "Simulation", "Vehicle", "Strategy", "Tower-defense",
            "Turn-based", "Sports", "Racing", "MMO", "Board", "Card", "Casual", "Idle", "Logic", "Sandbox",
            "Open-world", "Puzzle", "Indie", "VR", "Controller-Friendly"
        ];


    // initialize Tagify on the above input node reference
    var tagify = new Tagify(inputElm, {
        enforceWhitelist: true,
        whitelist: inputElm.value.trim().split(
            /\s*,\s*/) // Array of values. stackoverflow.com/a/43375571/104380
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