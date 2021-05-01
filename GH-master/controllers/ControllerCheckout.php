<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ControllerCheckout{

    private $_view;
    private $_gameManager;
    private $_cartManager;
    private $_checkoutManager;
    private $_userManager;

    function __construct(){
        if(isset($_POST["checkout"]))
        {
            $this->buy($_POST,$_POST["user_id"]);
            unset($_POST["checkout"]);
            $_SESSION["buyingSuccess"]=count($_POST["game"])>1?"Games bought successfully":"Game bought successfully";
            $this->sendMail();
            header("Location:".GameHeaven);
            exit();
        }
        else
        {
            $this->displayPage();
        }
    }

    function getCart($uid)
    {
        $cart=[];
        $this->_cartManager = new CartManager();
        $cartGames = $this->_cartManager->getCart($uid, "Cart");
        if (count($cartGames) > 0) {
            $this->_gameManager = new GameManager();
            foreach ($cartGames as $game) {
                $cart[] = $this->_gameManager->getGame($game->game_id, "Game")[0];
            }
        }
        return $cart;
    }

    function displayPage()
    {
        $cart=[];
        $userData=null;
        if(isset($_SESSION["user"]))
        {
            $cart = $this->getCart((int)$_SESSION["user"]->user_id);
            $userData=$_SESSION["user"];
        }
        
        $this->_view = new View("Checkout");
        $this->_view->generate(["cart"=>$cart,"userData"=>$userData]);
    }
    function buy($games,$uid)
    {
        $this->_checkoutManager = new CheckoutManager();
        $this->_checkoutManager->buy($games,$uid);
        $this->_userManager = new UserManager();
        $user = $this->_userManager->getUserInfo(null,$_SESSION["user"]->user_email);
        $user[0]->games = $this->_userManager->getUserOwnedGames($user[0]->user_id,"Game");
        $_SESSION["user"] = $user[0];
    }
    function sendMail()
    {
        $to_email = $_SESSION["user"]->user_email;
        $subject = "Receipt";
        $body = "Your ordered games are : \n";
        foreach($_POST["gameNames"] as $game)
        {
            $body.="- ".$game."\n";
        }
        $body.="----------------------------------------------\n Total price = ".$_POST["totalPrice"]."$\nThank you for choosing us.";
        $headers = "From: noreply@Gameheaven";
        mail($to_email, $subject, $body, $headers);
    }
}

?>