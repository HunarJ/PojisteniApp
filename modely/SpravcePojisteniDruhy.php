<?php
class SpravcePojisteniDruhy{
    //Vrátí všechny pojištěnce se vším infem
    public function vratDruhyPojisteni(){
        return Db::dotazVsechny('SELECT `pojisteni_druhy_id`, `pojisteni_druh` FROM `pojistenidruhy`');
    }

    //Přidá nový druh pojištění do databáze
    public function ulozDruhPojisteni($novyDruhPojisteni){
        Db::vloz('pojistenidruhy', $novyDruhPojisteni);
    }


}