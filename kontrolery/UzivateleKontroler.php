<?php
class UzivateleKontroler extends Kontroler{

        public function zpracuj($parametry){
            // Hlavička požadavku
         header("novePojisteni");
         // Hlavička stránky
         $this->hlavicka['titulek'] = 'Přidat pojištění';
         // Nastavení šablony
         $this->pohled = 'novePojisteni';
        }

}