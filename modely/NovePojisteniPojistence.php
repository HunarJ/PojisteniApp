<?php
class NovePojisteniPojistence{

    //Přidá nové pojištění k pojištěnci do databáze
    public function ulozPojisteni($novePojisteniPojistence){
        Db::vloz('pojisteni', $novePojisteniPojistence);
    }
    //Vrátí vše k vybrenému pojištěnci
    public function vratPojistenceDetail($pojistenciId){
        return Db::dotazVsechny('SELECT `pojistenci_id`, `jmeno`, `prijmeni` FROM `pojistenci` WHERE `pojistenci_id` = ?', array($pojistenciId));
    }

}