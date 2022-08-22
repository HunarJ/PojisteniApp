<?php
class SpravceDetailu{
    //Vrátí vše k vybrenému pojištěnci
    public function vratPojistenceDetail($pojistenciId){
        return Db::dotazVsechny('SELECT `pojistenci_id`, `jmeno`, `prijmeni`, `ulice`, `mesto`, `psc`, `email` , `telefon` FROM `pojistenci` WHERE `pojistenci_id` = ?', array($pojistenciId));
    }

    public function vratPojisteniPojistence($pojistenciId){
        return Db::dotazVsechny('SELECT `pojisteni`, `castka`, `predmet`, `pojisteni_id`, `pojistenec_id` FROM `pojisteni` WHERE `pojistenec_id` = ?', array($pojistenciId));
    }

    //Smaže vybrané pojištění pojištěnce
    public function smazPojisteni($pojisteniId){
        return Db::dotazJeden('DELETE FROM `pojisteni` WHERE `pojisteni_id` = ?', array($pojisteniId));
    }

}