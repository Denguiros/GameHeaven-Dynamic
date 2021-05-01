<?php

class VisitsManager extends Model
{
    public function getVisitsInMonth($month)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('select count(*) as Visits from site_visits where MONTH(visit_time) = :month and Year(visit_time) = YEAR(now())');
        $req->execute(["month"=>$month]);
        return $req->fetch(PDO::FETCH_COLUMN);
    }
}

?>
