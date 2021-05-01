

$( document ).ready(function() {
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    if(urlParams.has("page")){
        let page=urlParams.get("page");
        paramsLoader(page);
    }else{
        loadHomePage();
    }
});




function paramsLoader(page=""){
    switch (page) {
        case "home":
            loadHomePage();
            break;
        case "allGames":
            loadGames();
            break;
        case "approvedGame":
            loadGames(1);
            break;
        case "reportedGame":
            loadGames(2);
            break;
        case "requestedGame":
            loadGames(3);
            break;

        default:
            loadHomePage();

    }
}


var mainContainer = $('#pageContainer');

function loadHomePage(){

    mainContainer.load("home.php");
}

function loadGames(x='0'){

    mainContainer.fadeOut("fast").load("allGames.php?param="+x).fadeIn('fast');;
}

function loadDevs(x='0'){

    mainContainer.fadeOut("fast").load("allDevs.php?param="+x).fadeIn('fast');
}

function loadPubs(x='0'){

    mainContainer.fadeOut("fast").load("allPublishers.php?param="+x).fadeIn('fast');
}

function loadAllAdmins(){
    mainContainer.fadeOut("fast").load("allAdmins.php").fadeIn('fast');
}

function addAdmin(){
    mainContainer.fadeOut("fast").load("addAdmin.php").fadeIn('fast');
}

function loadUsers(x='0'){
    mainContainer.fadeOut("fast").load("allUsers.php?param="+x).fadeIn('fast');
}