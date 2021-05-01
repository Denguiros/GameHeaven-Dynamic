<?php

class SalesManager extends Model
{
    public function getLastMonthSales()
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('select sum(game_price*(1-game_discount/100)) as Sales from games where game_id in (SELECT purchase_game_id from purchases where YEAR(purchase_time) = YEAR(CURRENT_TIMESTAMP) and MONTH(purchase_time) = MONTH(CURRENT_TIMESTAMP))');
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
    public function getLastYearSales()
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('select sum(game_price*(1-game_discount/100)) as Sales from games where game_id in (SELECT purchase_game_id from purchases where YEAR(purchase_time) = YEAR(CURRENT_TIMESTAMP))');
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
    public function getSalesInMonth($month)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('select sum(game_price*(1-game_discount/100)) as Sales from games where game_id in (SELECT purchase_game_id from purchases where MONTH(purchase_time) = :month and YEAR(purchase_time) = YEAR(CURRENT_TIMESTAMP))');
        $req->execute(["month"=>$month]);
        return $req->fetch(PDO::FETCH_COLUMN);
    }
}

?>
