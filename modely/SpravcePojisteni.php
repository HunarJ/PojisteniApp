<?php
class SpravcePojisteni{

    //Smaže vybrané pojištění pojištěnce
    public function smazPojisteni($pojisteniId){
        return Db::dotazJeden('DELETE FROM `pojisteni` WHERE `pojisteni_id` = ?', array($pojisteniId));
    }

    //Smaže všechna pojištění pojištěnce
    public function smazVsechnaPojisteni($pojistenecId){
        return Db::dotazVsechny('DELETE FROM `pojisteni` WHERE `pojistenec_id` = ?', array($pojistenecId));
    }

}