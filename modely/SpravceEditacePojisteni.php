<?php
class SpravceEditacePojisteni{

    //Edituje pojištění pojištěnce
    public function editujPojisteni($pojisteniEditace, $PojistenecId){
        Db::zmen('pojisteni', $pojisteniEditace, 'WHERE pojisteni_id = ?', array($PojistenecId));
    }
    //Vrátí vše k vybrenému pojištěnci
    public function vratPojistence($pojistenciId){
        return Db::dotazVsechny('SELECT `jmeno`, `prijmeni` FROM `pojistenci` WHERE `pojistenci_id` = ?', array($pojistenciId));
    }

    //Vrátí vše k vybrenému pojisteni
    public function vratPojisteni($pojisteniId){
        return Db::dotazVsechny('SELECT `pojisteni_id`, `pojistenec_id`, `pojisteni`, `castka`, `predmet`, `platnost_od`, `platnost_do` FROM `pojisteni` WHERE `pojisteni_id` = ?', array($pojisteniId));
    }

}
