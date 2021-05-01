<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class ControllerCart
{
    private $_cartManager;
    private $_gameManager;

    public function __construct($action = null, $data)
    {
        if (isset($_SESSION["user"])) {
            $uid = $_SESSION["user"]->user_id;
            if ($action == 'addToCart') {
                $this->addToCart($uid, $data);
            }
            if ($action == 'removeFromCart') {
                $this->removeFromCart($uid, $data);
            }
            if ($action === null) {
                $this->getCart($uid);
            }
        } else {
            throw new Exception("Couldn't Proceed with action.");
        }
    }

    private function addToCart($uid, $game_id)
    {

        $this->_cartManager = new CartManager();
        $this->_cartManager->addToCart($uid, $game_id);
    }

    public function getCart($uid)
    {
        $this->_cartManager = new CartManager();

        $cartGames = $this->_cartManager->getCart($uid, "Cart");
        if (count($cartGames) > 0) {
            $this->_gameManager = new GameManager();
            $cart = [];
            foreach ($cartGames as $game) {
                $cart[] =  (array)$this->_gameManager->getGame($game->game_id, "Game")[0];
            }
            $json = json_encode($cart, JSON_UNESCAPED_SLASHES);
            echo $json;
        }
    }
    public function removeFromCart($uid, $game_id)
    {
        $this->_cartManager = new CartManager();
        $this->_cartManager->removeFromCart($uid, $game_id);
    }
}
