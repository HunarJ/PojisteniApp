<?php
class SpravceEditacePojistence{

    //Upraví položky pojištěnce
    public function editujPojistence($pojistenecEditace, $PojistenecId){
        Db::zmen('pojistenci', $pojistenecEditace, 'WHERE pojistenci_id = ?', array($PojistenecId));
    }

    //Vrátí vše k vybrenému pojištěnci
    public function vratPojistenceDetail($pojistenciId){
        return Db::dotazVsechny('SELECT `pojistenci_id`, `jmeno`, `prijmeni`, `email`, `telefon`, `mesto`, `psc`, `ulice` FROM `pojistenci` WHERE `pojistenci_id` = ?', array($pojistenciId));
    }
}