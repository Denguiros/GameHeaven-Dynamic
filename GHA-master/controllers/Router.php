<?php 
require_once("views/View.php");

class Router{

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

            if(isset($_POST["resetAdminPass"])){
                $controllerClass = "ControllerAdmins";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"reset");
            }
            

            if(isset($_POST["logoutAdmin"])){
                $controllerClass = "ControllerAdmins";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,null,"logout");
            }


            if(isset($_POST["editAdmin"])){
                $controllerClass = "ControllerAdmins";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"editAdmin");
            }

            if(isset($_POST["removeAdmin"])){
                
                $controllerClass = "ControllerAdmins";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"removeAdmin");
            }

            

            if(isset($_POST["dissapprovePub"])){
                $controllerClass = "ControllerPublishers";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"Dissapprove");
            }
            if(isset($_POST["deletePub"])){
                $controllerClass = "ControllerPublishers";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"Delete");
            }

            if(isset($_POST["approvePub"])){
                $controllerClass = "ControllerPublishers";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"Approve");
            }


            if(isset($_POST["addAdmin"])){
               
                $controllerClass = "ControllerAddAdmin";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST);
            }

            if(isset($_POST["addRetroGame"])){
                $controllerClass = "ControllerAddRetro";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,$_FILES);
            }

            if(isset($_POST["dissaproveUser"])){
                $controllerClass = "ControllerUsers";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"Dissaprove");
            }
            if(isset($_POST["deleteUser"])){
                $controllerClass = "ControllerUsers";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"Delete");
            }

            if(isset($_POST["approveUser"])){
                $controllerClass = "ControllerUsers";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"Approve");
            }
            if(isset($_POST["dissaproveGame"])){
                $controllerClass = "ControllerGames";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"Dissaprove");
            }

            if(isset($_POST["removeFromRec"])){
                $controllerClass = "ControllerGames";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"removeFromRec");
            }
            if(isset($_POST["addToFeatured"])){
                $controllerClass = "ControllerGames";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"addToFeatured");
            }

            if(isset($_POST["removeFromFeatured"])){
                $controllerClass = "ControllerGames";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"removeFromFeatured");
            }
            if(isset($_POST["addToRec"])){
                $controllerClass = "ControllerGames";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"addToRec");
            }

            if(isset($_POST["approveGame"])){
                $controllerClass = "ControllerGames";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"Approve");
            }
            if(isset($_POST["deleteGame"])){
                $controllerClass = "ControllerGames";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST,"Delete");
            }
            if(isset($_POST["loginAdmin"])){
                $controllerClass = "ControllerLogin";
                $controllerFile = "controllers/".$controllerClass.".php";
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url,$_POST);
            }


            if(isset($_GET['url']))
            {

                $url = explode('/',$_GET['url']);
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
                require_once('controllers/ControllerLogin.php');
                $this->_ctrl = new ControllerLogin($url);
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

?>