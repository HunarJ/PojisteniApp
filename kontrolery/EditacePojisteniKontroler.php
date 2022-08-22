<?php
class EditacePojisteniKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        $spravceEditacePojisteni = new SpravceEditacePojisteni();
        //Ověří, jestli je uživatel přihlášený, jestli ne, tak přesměruje na přihlážení -> zabezpečení pro vstup na stránku pro neprihlášené uživatele
        $this->overPrihlaseni();
         // Hlavička požadavku
         header("editace-pojisteni");
         // Hlavička stránky
         $this->hlavicka['titulek'] = 'Editace pojištění';
         // Nastavení šablony
         $this->pohled = 'editacePojisteni';

         
        $pojisteniEditace = array(
            'castka' => '',
            'predmet' => '',
            'platnost_od' => '',
            'platnost_do' => ''
        );
        

        $pojisteniId = $parametry[1];

        //Naplnění dat pro výpis v pohledu
        $pojisteniInfo = $spravceEditacePojisteni->vratPojisteni($pojisteniId);
        $pojistenecId = $pojisteniInfo[0][1];
        $pojistenecInfo = $spravceEditacePojisteni->vratPojistence($pojistenecId);
        
        $this->data['pojisteniInfo'] = $pojisteniInfo;
        $this->data['pojistenecInfo'] = $pojistenecInfo;

        //var_dump($pojisteniInfo);

        if($_POST){
            //Získání dat z $_POST
            $klice = array('castka', 'predmet', 'platnost_od', 'platnost_do');
            $pojisteniEditace = array_intersect_key($_POST, array_flip($klice));
            //Uložení pojištěnce do databáze
            $spravceEditacePojisteni->editujPojisteni($pojisteniEditace, $pojisteniId);
            $this->pridejZpravu('Pojištění bylo úspěšně upraveno.');
            $this->presmeruj("detail/$pojistenecId");
            }

    }
}