<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class ControllerHome{
    private $_view;
    private $_manager;
    
    public function __construct($url)
    {
        
        if(!isset($_SESSION["admin"])) header("location:".AdminPanel);

        $this->_view = new View("Home");
        $this->_view->generate(array("data" => $this->getData()));
    }
    private function getData()
    {
        $this->_manager = new GameManager();
        $data["Game_requests"] = $this->_manager->getRequestedGames();
        $this->_manager = new PublisherManager();
        $data["Publisher_requests"] = $this->_manager->getRequestedPublishers();
        $this->_manager = new SalesManager();
        $data["SalesThisMonth"] = $this->_manager->getLastMonthSales();
        $data["SalesThisYear"] = $this->_manager->getLastYearSales();
        for($i=1;$i<13;$i++)
        {
            $MonthSales[$i] = $this->_manager->getSalesInMonth($i);
        }
        $data["SalesPerMonth"]=$MonthSales;
        $this->_manager = new VisitsManager();
        for($i=1;$i<13;$i++)
        {
            $MonthVisits[$i] = $this->_manager->getVisitsInMonth($i);
        }
        $data["VisitsPerMonth"]=$MonthVisits;
        return $data;
    }
}



?>