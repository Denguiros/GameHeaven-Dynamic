
var site = document.getElementById("siteName").value;
function randomNumber(min, max) { // min and max included 
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function filterOptions() {
    var field = "";
    var body = document.getElementById("body");
    body.innerHTML=``;
    var options = [];
    options["price"] = parseInt($("#price").val());
    options["discounted"] = $("#discounted").is(':checked');
    genres = $(".genres").find("input:checked").map(function () {
        return $(this).val();
    }).get();
    options["genres"] = genres.length == 0 ? 0 : genres;
    platforms = $(".platforms").find("input:checked").map(function () {
        return $(this).val();
    }).get();

    options["platforms"] = platforms.length == 0 ? 0 : platforms;
    var fdata = new FormData();
    fdata.append("price", options["price"]);
    fdata.append("discounted", options["discounted"]);
    fdata.append("genres", options["genres"]);
    fdata.append("platforms", options["platforms"]);
    fdata.append("browseGames", 1);
    console.log(fdata);
    $.ajax({
        type: "POST",
        url: "index.php",
        contentType: false,
        processData: false,
        data: fdata,
        success: function (response) {
            console.log(response);
            if (response == "null") {
                field += `           
                <div class="product-list">
                    <h1 style="color:red"> No game was found ! </h1>
                </div>
                `;
            }
            else {

                var js = JSON.parse(response);
                Object.keys(js).forEach(function (game) {
                    field += `
                <div class="product-list">
                <a href="`+ site + `game/` + js[game]["\u0000Game\u0000data"]["game_id"] + `"> 
                        <div class="row mb-4 ">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="cycle-slideshow" id="slideshow-`+ randomNumber(10000, 1000000) + `" data-cycle-fx="fadeout" data-cycle-manual-fx="scrollHorz" data-cycle-timeout="500">
                                       `;
                    js[game]["\u0000Game\u0000data"]["game_images"].forEach(function (e) {
                        field += '<img src="' + e + '">';
                    });
                    field += `
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div class="row">
                                    <div class="col-lg-7 col-xl-7">
    
                                        <h5>`+ js[game]["\u0000Game\u0000data"]["game_name"] + `</h5>
                                        <p class="mb-2 text-muted text-uppercase small">`+ js[game]["\u0000Game\u0000data"]["game_release_date"] + `</p>
                                        <hr>
                                        <p class="text-left">`;
                    js[game]["\u0000Game\u0000data"]["game_genres"].split(",").forEach(function (genre) {
                        field += '<span class="badge badge-light" style="background-color: rgb(88,91,94);margin-right: 0.3em;;margin-bottom:0.3em">' + genre + '</span>';
                    })
                    field += `     
                                        </p>
                                        <p class="mb-lg-0" style="color:white;">
                                           `;
                    js[game]["\u0000Game\u0000data"]["game_platforms"].split(",").forEach(function (platform) {
                        field += '<i class="fab fa-' + platform + '" style="color: rgb(255,255,255);margin-right:0.3em;margin-bottom:0.3em"></i>';
                    })

                    field += `
                                        </p>
    
                                    </div>
                                    <div class="col-lg-5 col-xl-5">
                                        `;
                    if (js[game]["\u0000Game\u0000data"]["game_discount"] > 0) {
                        field += `
                                            <span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                <i class="fa fa-tag fa-stack-2x"></i>
                                                <i class="fa fa-stack-1x fa-inverse">`+ js[game]["\u0000Game\u0000data"]["game_discount"] + `%</i>
                                            </span>
                                            <p class="thumb-text">
                                                <del style="color:white;font-size:0.9rem;">$`+ js[game]["\u0000Game\u0000data"]["game_price"] + `</del>
                                                $`+ (js[game]["\u0000Game\u0000data"]["game_price"] * (1 - js[game]["\u0000Game\u0000data"]["game_discount"] / 100)).toFixed(2) + `
                                            </p>`;
                    }
                    else {
                        field += `<h6 class="mb-3"><span style="color:red;">$` + js[game]["\u0000Game\u0000data"]["game_price"] + `</span></h6>`;
                    }
                    field += `
                                            
                                     
                                        <div class="my-4">
                                            <button type="button" class="btn btn-light btn-md mr-1 mb-2"><i class="fas fa-info-circle pr-2"></i>Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            `;
                });
            }
            body.innerHTML += field;
            reinitialize();
        },
        error: function (error) {
            alert(error.message);
        }
    });
}
