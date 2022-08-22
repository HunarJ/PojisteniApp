<?php
class PojistenipojistenecKontroler extends Kontroler{

        public function zpracuj($parametry){
        //$spravceDetailu = new SpravceDetailu();
        $pojisteniPojistence = new NovePojisteniPojistence();
        $spravcePojisteniDruhy = new SpravcePojisteniDruhy();
         //Ověří, jestli je uživatel přihlášený, jestli ne, tak přesměruje na přihlážení -> zabezpečení pro vstup na stránku pro neprihlášené uživatele
         $this->overPrihlaseni();
        // Hlavička požadavku
         header("novePojisteni");
         // Hlavička stránky
         $this->hlavicka['titulek'] = 'Přidat pojištění';
         // Nastavení šablony
         $this->pohled = 'novePojisteni';
        
        $novePojisteniPojistence = array(
              'pojistenec_id' => '',
              'pojisteni' => '',
              'castka' =>'',
              'predmet' => '',
              'platnost_od' => '',
              'platnost_do' => ''
        );

        
        $pojistenec = $pojisteniPojistence->vratPojistenceDetail($parametry[1]);
        $druhyPojisteniCelek = $spravcePojisteniDruhy->vratDruhyPojisteni();
        $druhyPojisteni = [];
        for($i=0; $i< count($druhyPojisteniCelek); $i++){
                array_push($druhyPojisteni, $druhyPojisteniCelek[$i][1]);
        }

        //Naplnění pole data důležitými hodnotami
        $this->data['pojistenec']=$pojistenec;
        $this->data['druhyPojisteni']=$druhyPojisteni;


        //var_dump($druhyPojisteni);
        //var_dump($pojistenec);

        if($_POST){
                //Získání dat z POST
                $klice = array('pojistenec_id', 'pojisteni', 'castka', 'predmet', 'platnost_od', 'platnost_do');
                $novePojisteniPojistence = array_intersect_key($_POST, array_flip($klice));
                //Uložení pojištěnce do databáze
                $pojisteniPojistence->ulozPojisteni($novePojisteniPojistence);
                $this->pridejZpravu('Pojištění bylo úspěšně přidáno');
                $this->presmeruj("detail/$parametry[1]");
        }

        }

}