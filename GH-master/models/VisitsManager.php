<?php

class VisitsManager extends Model
{
    public function addVisit()
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('INSERT INTO site_visits(visit_time) values(now())');
        $req->execute();
        $req->closeCursor();
    }
}

?>
