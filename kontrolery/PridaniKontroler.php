<?php
class PridaniKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        $spravcePridani = new SpravcePridani();
        $spravceDetailu = new SpravceDetailu();
         //Ověří, jestli je uživatel přihlášený, jestli ne, tak přesměruje na přihlážení -> zabezpečení pro vstup na stránku pro neprihlášené uživatele
         $this->overPrihlaseni();
         // Hlavička požadavku
         header("pridani");
         // Hlavička stránky
         $this->hlavicka['titulek'] = 'Přidání pojištěnce';
         // Nastavení šablony
         $this->pohled = 'pridani';

         $pojistenec = array(
            'jmeno' => '',
            'prijmeni' => '',
            'email' => '',
            'telefon' => '',
            'ulice' => '',
            'mesto' => '',
            'psc' => ''
         );

        $this->data['pojistenec'] = $pojistenec;

        

        if($_POST){
            //Získání dat z $_POST
            $klice = array('jmeno', 'prijmeni', 'email', 'telefon', 'ulice', 'mesto', 'psc');
            $pojistenecNovy = array_intersect_key($_POST, array_flip($klice));
            //Uložení pojištěnce do databáze
            $spravcePridani->ulozPojistence($pojistenecNovy);
            $this->pridejZpravu('Pojištěnec byl úspěšně přidán.');
            $this->presmeruj('pojistenci');
            }


        



    }
}