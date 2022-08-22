<?php
class SpravcePridani{

    //Přidá nového pojištěnce do databáze pojištěnců
    public function ulozPojistence($pojistenecNovy){
        Db::vloz('pojistenci', $pojistenecNovy);
    }
}