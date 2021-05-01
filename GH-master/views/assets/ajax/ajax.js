var site = document.getElementById("siteName").value;
function getCart() {
    var field = "";
    var discountedPrice = 0;
    var total = 0;
    var cartBody = document.getElementById("cartBody");
    cartBody.innerHTML = "";
    cartBody.innerHTML += '<div class="modal-header border-bottom-0"><h5 class="modal-title" id="exampleModalLabel"> Your Shopping Cart </h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div><div class="modal-body">';
    var cont = "";
    var cartButton = $("#cartButton");
    var fdata = new FormData();
    fdata.append("getCart", "1");
    $.ajax({
        type: "POST",
        url: "index.php",
        contentType: false,
        processData: false,
        data: fdata,
        success: function (response) {
            if (!response) {
                cartBody.innerHTML += '&nbsp;&nbsp;&nbsp;Cart empty ! <div class="modal-footer border-top-0 d-flex justify-content-between"><button type="button" class="btn btn-dark" data-dismiss="modal">Close</button></div>'
                cartButton.html('Cart(0) <i class="fa fa-shopping-cart"></i>');

            }
            else {
                cartBody.innerHTML += '<table class="table table-image "><thead><tr><th scope="col"></th><th scope="col">Game</th><th scope="col">Price</th><th scope="col">Actions</th></thead><tbody id="cartGamesHolder">'

                var js = JSON.parse(response);
                cartGames = Object.keys(js).length;
                cartButton.html('Cart(' + cartGames + ') <i class="fa fa-shopping-cart"></i>');
                Object.keys(js).forEach(function (keys) {
                    field = '<tr style="color:black"><td class="w-25"><img src="$img" class="img-fluid img-thumbnail" alt="img"></td><td>$gname</td><td>$discount $</td><td><button href="#" class="btn btn-danger btn-sm" onclick="removeFromCart($game_id)"><i class="fa fa-times"></i></button></td></tr>';
                    Object.keys(js[keys]).forEach(function (key) {

                        field = field.replace("$gname", js[keys][key]["game_name"]);
                        field = field.replace("$game_id", js[keys][key]["game_id"]);
                        field = field.replace("$img", site + "games/" + js[keys][key]["game_folder"] + "/images/1.jpg");
                        discountedPrice = Math.round(js[keys][key]["game_price"] * (1 - js[keys][key]["game_discount"] / 100));
                        field = field.replace("$discount", discountedPrice);
                    });
                    total += discountedPrice;
                    cont += field;
                });
                end = '</tbody></table><div class="d-flex justify-content-end"> <h5 class="price text-success" style="margin-right:1rem">Total: <span>' + total + '$</span></h5> </div></div><div class="modal-footer border-top-0 d-flex justify-content-between"><button type="button" class="btn btn-dark" data-dismiss="modal">Close</button><button type="button" class="btn btn-success" onclick="location.assign('+"'"+site+"Checkout'"+')">Checkout</button></div>'
                cartBody.innerHTML = cartBody.innerHTML.substring(0, cartBody.innerHTML.length - 16) + cont + end;
            }


        },
        error: function (error) {
            alert(error.message);
        }
    });
};
function addToCart() {
    var fdata = new FormData();
    fdata.append("addToCart", "1");
    fdata.append("game_id", $("input#game_id").val());
    $.ajax({
        type: "POST",
        url: "index.php",
        contentType: false,
        processData: false,
        data: fdata,
        success: function (response) {
            if (response == 1) {
                addedToCart();
                getCart();
            }
            else {
                alreadyExists();
            }
        },
        error: function (error) {
            alert(error.message);
        }
    });
}
function removeFromCart(game_id) {
    var fdata = new FormData();
    fdata.append("removeFromCart", "1");
    fdata.append("game_id", game_id);
    $.ajax({
        type: "POST",
        url: "index.php",
        contentType: false,
        processData: false,
        data: fdata,
        success: function (response) {
            if (response == 1) {
                console.log(response);
                removedFromCart(); //toast removed
                getCart(); //update cart
            }
        },
        error: function (error) {
            alert(error.message);
        }
    });
}
function reportGame() {
    var fdata = new FormData();
    fdata.append("report", "1");
    fdata.append("reason", $('input[name="reason"]:checked').val());
    fdata.append("description", $("#description").val());

    $.ajax({
        type: "POST",
        url: "index.php",
        contentType: false,
        processData: false,
        data: fdata,
        success: function (response) {
            console.log(response);
            if (response == 1) {
                reportedGame();
            }
        },
        error: function (error) {
            alert(error.message);
        }

    });
}

$(function () {
    var games = [];
    input=$("#autocomplete");
    input.on("input", function(){
        searchGames($(this).val());
        
    });
    function searchGames(gameName)
    {
        games.length=0;
        var fdata = new FormData();
        fdata.append("searchGames", 2);
        fdata.append("gameName",gameName)
        $.ajax({
            type: "POST",
            url: "index.php",
            contentType: false,
            processData: false,
            data: fdata,
            success: function (response) {
               
                if (response == "null") {
                    
                }
                else {
                   
                    var js = JSON.parse(response);
                    Object.keys(js).forEach(function (game) {
                        var game = {value:site+"game/"+js[game]["\u0000Game\u0000data"]["game_id"],label:js[game]["\u0000Game\u0000data"]["game_name"]}
                        games.push(game);
                    });
                }
                
            },
            error: function (error) {
                alert(error.message);
            }
        });
    }
    $("#autocomplete").autocomplete({
        source: games,
        select: function( event, ui ) { 
            location.assign(ui.item.value);
            $("#autocomplete").val()="";
        },
        focus: function (event, ui) {
            this.value = null
            event.preventDefault();
        },
        response: function(event, ui) {
            if (!ui.content.length) {
                var noResult = { value:"",label:"No results found" };
                ui.content.push(noResult);
            } else {
                $("#autocomplete").empty();
            }
        }
    });
    $("#searchBar").on("submit",function(e)
    {
        return false;
    });
    
});

function addToVisits()
{
    var fdata = new FormData();
    fdata.append("addToVisits", "1");
    $.ajax({
        type: "POST",
        url: "index.php",
        contentType: false,
        processData: false,
        data: fdata,
        success: function (response) {    
        },
        error: function (error) {
            alert(error.message);
        }
    });
}
