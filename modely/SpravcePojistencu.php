<?php
class SpravcePojistencu{
    //Vrátí jméno pojištěnce
    public function vratJmeno($jmeno){
        return Db::dotazJeden(
            'SELECT `jmeno` FROM `pojistenci` WHERE `jmeno` = ?', array($jmeno)
        );
    }
    //Vrátí příjmení pojištěnce
    public function vratPrijmeni($prijmeni){
        return Db::dotazJeden(
            'SELECT `prijmeni` FROM `pojistenci` WHERE `prijmeni` = ?', array($prijmeni)
        );
    }
    //Vrátí adresu pojištěnce
    public function vratAdresu($ulice){
        return Db::dotazJeden(
            'SELECT `ulice` FROM `pojistenci` WHERE `ulice` = ?', array($ulice)
        );
    }
    //Vrátí celkový počet pojištěnců
    public function vratPocetPojistencu(){
        return Db::dotazSamotny(
            'SELECT `COUNT(*)` FROM `pojistenci`', array()
        );
    }
    //Vrátí všechny pojištěnce se vším infem
    public function vratPojistence(){
        return Db::dotazVsechny('SELECT `pojistenci_id`, `jmeno`, `prijmeni`, `ulice`, `mesto`, `psc`, `email` , `telefon` FROM `pojistenci`');
    }

    //Smaže pojištěnce z databáze
    public function smazPojistence($pojistenecId){
        return Db::dotazJeden('DELETE FROM `pojistenci` WHERE `pojistenci_id` = ?', array($pojistenecId));

    }

}