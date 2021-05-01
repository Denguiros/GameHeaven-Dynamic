<?php
require_once("views/View.php");
class Router
{
    private $_ctrl;
    private $_view;
    public function routeReq()
    {
        try{
            //Chargement automatique des classes
            spl_autoload_register(function($class)
            {
                require_once('models/'.$class.'.php');
            });

            $url = "";

            if(isset($_POST["checkout"])){
                $controller = "Checkout";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                $this->_ctrl = new $controllerClass();
            }
            if(isset($_POST["addToVisits"])){
                $controller = "Visits";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                $this->_ctrl = new $controllerClass();
            }
            if(isset($_POST["editPicture"])){
                $controller = "EditProfile";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                $pic = $_FILES["profileImage"] ?? null;
                
                $this->_ctrl = new $controllerClass(null,null,$pic);
            }



            if(isset($_POST["editProfile"])){

                $controller = "EditProfile";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                
                $this->_ctrl = new $controllerClass(null,$_POST,null);

            }

            if(isset($_POST["updateUserPassword"])){
                 $controller = "EditProfile";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                
                $this->_ctrl = new $controllerClass(null,$_POST,null,"EditPass");
            }

            if(isset($_POST["addToCart"])){

                $controller = "Cart";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                
                $this->_ctrl = new $controllerClass("addToCart",$_POST["game_id"]);
                return ;

            }
            if(isset($_POST["removeFromCart"])){

                $controller = "Cart";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                
                $this->_ctrl = new $controllerClass("removeFromCart",$_POST["game_id"]);
                return ;

            }
            if(isset($_POST["browseGames"]))
            {
                $controller = "Browse";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                
                $this->_ctrl = new $controllerClass($_POST["browseGames"],null,$_POST["price"],$_POST["discounted"],$_POST["genres"],$_POST["platforms"]);
                
                return;
            }
            if( isset($_POST["searchGames"]))
            {
                $controller = "Browse";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                
                $this->_ctrl = new $controllerClass($_POST["searchGames"],$_POST["gameName"],null,null,null);
                
                return;
            }
            //GET CART
            if(isset($_POST['getCart']))
            {
                $controller = "Cart";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);

                
                $this->_ctrl = new $controllerClass(null,null);
                
                return;
            }

            //LOGIN
            if(isset($_POST["login"])){


                $controller = "Authentication";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST["email"],$_POST["pass"],null,"Login");


            }

            //REGISTER
            if(isset($_POST["register"])){

                $controller = "Authentication";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($_POST["un"],$_POST["email"],$_POST["pass"],$_POST["confirmPass"],"Register");

            }

            //Reset password
            if(isset($_POST["ResetPass"])){
                $controller = "Authentication";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST["email"],null,null,"ResetPass");

            }
            //Verify account

            if (isset($_POST["verifyAccounts"])){
                $controller = "VerifyUser";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,"verify");
            }

            //Resend verification code
            if(isset($_POST["resendCode"])){
                $controller = "VerifyUser";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,"resendCode");
            }

            //REPORTING GAMES
            if(isset($_POST["report"])){
                $r = $_POST["reason"];
                $desc ="None";
                if(!empty($_POST["description"])) $desc = $_POST["description"];
                

                $controller = "Game";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $data = array($r,$desc);
                
                $this->_ctrl = new $controllerClass($url,$data,"Report");
                return ;
            }
            
            //Adding game
            if(isset($_POST["addGame"])){
                $controller = "AddGame";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,$_FILES);
            }

            //Editing basic game info
            if(isset($_POST["updateBasicGameInfo"])){
                
                $controller = "EditGame";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,"EditBasicInfo");
            }
            //Create new franchise
            if(isset($_POST["createFranchise"])){
                $controller = "EditGame";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,"CreateFranchise");
            }
            //Editing existing game franchise
            if(isset($_POST["EditFranchise"])){
                $controller = "EditGame";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,"EditFranchise");
            }
            //Changing discount value
            if(isset($_POST["updateDiscount"])){
                $controller = "EditGame";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,"updateDiscount");
            }
            //Editing game media
            if(isset($_POST["updateMedia"])){
                
                $controller = "EditGame";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_FILES,"EditMedia",$_POST["game_folder"]);
            }
            //Editing Game Requirments
            if(isset($_POST["updateRequirments"])){
                $controller = "EditGame";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,"updateRequirments");
            }
            //Edit social media links
            if(isset($_POST["editSocialLinks"])){
                $controller = "EditGame";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,"editSocialLinks");
            }

            //Delete franchise
            if(isset($_POST["removeFranchise"])){
                $controller = "Publisher";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST);
            }

            //Delete game
            if(isset($_POST["deleteGame"])){
                $controller = "EditGame";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,$_POST,"deleteGame");
            }


            //Logging out
            if(isset($_POST["logout"])){

                $controller = "Authentication";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $this->_ctrl = new $controllerClass(null,null,null,null,"Logout");

            }

            //Becoming a publisher 
            if(isset($_POST["becomePublisher"])){
                
                $controller = "Publisherforms";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,$_FILES["pubLogo"],"Add");
            }
            //Editing publisher profile
            if(isset($_POST["editPublisher"])){
                
                $controller = "Publisherforms";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,$_FILES["pubLogo"],"Edit");
            }

            //Opt out publisher
            if(isset($_POST["optOutPublisher"])){
                $controller = "Publisherforms";
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,null,null,"optOut");
            }


            //Le controlleur est inclus selon l'action de l'utilisateur
            if(isset($_GET['url']))
            {
                
                $url = explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";



                if(file_exists($controllerFile))
                {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else
                {
                    throw new Exception ("Page not found");
                }
            }
            else
            {
                require_once('controllers/ControllerAccueil.php');
                $this->_ctrl = new ControllerAccueil($url);
            }

        }
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            $this->_view = new View("Error");
            $this->_view->generate(array('errorMsg'=>$errorMsg));
        }
    }
}
