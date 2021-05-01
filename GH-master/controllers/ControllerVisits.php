<?php
    class ControllerVisits{
        private $_manager;
        public function __construct()
        {
            $this->_manager = new VisitsManager();
            $this->_manager->addVisit();
        }
    }
?>